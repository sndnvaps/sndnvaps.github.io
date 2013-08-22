---
layout: post
published: true
title: OpenGL FAQ (八) 視圖與相機鏡頭轉換及 gluLookAt()
tags: OpenGL
categories: [ 技術筆記 ]
---

### 8.010 OpenGL裡的鏡頭到底是怎麼運作的呢?

就目前的OpenGL來說，沒有鏡頭這種東西。

更精確地講，鏡頭永遠都位處於眼空間座標的原點 (0,0,0)。
OpenGL應用程式為了假裝出鏡頭移動的樣子，必須移動場景，對整個世界場景做鏡頭的逆空間轉換。

### 8.020 我要如何移動場景裡的眼睛或者鏡頭呢?

以OpenGL鏡頭模型來說，OpenGL沒有提供介面去做這件事情。然而，GLU庫提供了gluLookAt()函數，傳入眼睛的本身位置，眼睛瞄準點位置，以及指上向量(up vector)，都基於世界空間坐標。
這個函數依據參數計算出正確的相機逆空間轉換矩陣，並且乘上目前的矩陣。

### 8.030 我的相機鏡頭應該放在 ModelView 矩陣還是 Projection矩陣?</h3>

GL_PROJECTION 矩陣只應該包含投影變換，它將眼空間坐標(eye space coordinates)轉換到裁切坐標(clip coordinates)。

而GL_MODELVIEW矩陣呢，人如其名，應該包含模型(modeling)與視圖(viewing)轉換，
將物體空間坐標轉換成眼空間座標。所以請記住，永遠把相機鏡頭轉換放在GL_MODELVIEW矩陣，而不是GL_PROJECTION矩陣。

你可以把投影矩陣(projection matrix)想像成相機鏡頭的各種特性，像是視角的寬窄、焦距、是不是裝了魚眼鏡頭等等。
把模型視圖矩陣(model-view matrix)想像成你目前拿著相機站立的位置，及鏡頭指向的方向。

這份文件 [The game dev FAQ][0] 對此二個矩陣說明得不錯。

[0]: http://www.opengl.org/resources/faq/technical/openglfaq.txt "Game Dev FAQ"

或者去讀讀 Steve Baker 的文章[「濫用投影」][1] 。此文寫得極好，值得推薦。許多菜鳥OpenGL程式員曾蒙其益。

[1]: http://sjbaker.org/steve/omniv/projection_abuse.html "濫用投影"

### 8.040 我該如何實現鏡頭變焦 (Zoom) 操作?

最簡單的做法是對 ModelView矩陣做等比縮放(uniform scale)。
但是當模型放得太大，通常會導致模型被近平面及遠平面裁切掉。

比較好的做法是限縮投影矩陣裡view volume的寬與高。
舉例來說，你的程式對應使用者的輸入，儲存了一個縮放參數值。當縮放值是1.0 時不變焦。
縮放值變大就縮小視角，結果模型看起來就放大了。
縮放值變小時就反過來做。

程式碼範例看起來可能像這樣子:

<pre class="prettyprint">
/* 如果你想就設成全域變數。依使用者輸入改變值，初始值是1.0 */
static float zoomFactor = 1;

/* 一個設定投影矩陣的例程，通常在 resize 事件處理呼叫它。
   繪圖區域的寬、高是整數。
   這個小範例會創建一個投影矩陣，有正確長寬比以及縮放參數。
*/
void setProjectionMatrix (int width, int height)
{
    glMatrixMode(GL_PROJECTION);
    glLoadIdentity();
    gluPerspective (50.0*zoomFactor, (float)width/height, zNear, zFar);
    /* 'zNear' 與 'zFar' 隨你高興 */
}
</pre>

也許你的程式調用的是 glFrustum() 而非 glPerspective()。這會有點棘手，因為 left, right, bottom, top 這四個參數與近平面(zNear) 的距離，也會影響視野大小。這裡合理的假設你使用固定的近平面距離，那 glFrustum() 看起來會是:

<pre class="prettyprint">
glFrustum(left*zoomFactor, right*zoomFactor,
          bottom*zoomFactor, top*zoomFactor,
          zNear, zFar);
</pre>

glOrtho() 用法也差不多。

### 8.050 我有了目前的ModelView矩陣，該如何反推相機鏡頭在物體空間裡頭的座標位置?

相機鏡頭或眼睛位置永遠位於眼空間的原點 (0,0,0)。將原點轉換成向量 [0 0 0 1] ，然後用 ModelView 矩陣的反矩陣去乘，結果就是相機鏡頭在物體空間中的座標位置。OpenGL不允許你查詢ModelView矩陣的反矩陣 (用glGet*等函數)，你必須要自己寫代碼來計算反矩陣。

### 8.060 我該怎麼樣讓鏡頭不斷「環繞」著場景中的某一點運行旋轉?

你可以把鏡頭留在原位不動，而轉動整個場景/世界來模擬環繞運行效果。比方說，鏡頭要以一個Y軸為中心繞行，同時也持續地盯著原點看的話，可以這樣做:

<pre class="prettyprint">
gluLookAt(camera[0], camera[1], camera[2], /* 鏡頭的 XYZ  位置*/
          0, 0, 0,                         /* 看著原點 */
          0, 1, 0);                        /* Y指上向量 */
glRotatef(orbitDegrees, 0.f, 1.f, 0.f);    /* 繞行Y軸的角度 */
/* ...也許 orbitDegrees 可以從滑鼠拖曳推算出來 */
glCallList(SCENE);                         /* 畫出整個場景 */
</pre>

如果你堅持一定要在物理上旋轉相機位置，在視圖轉換之前，先對相機鏡頭的位置做空間轉換。此種狀況我建議你去查考一下gluLookAt()這個函式。

### 8.070 我要怎樣才能自動推算出剛剛好涵蓋整個物體模型的視角? (我知道 bounding sphere 與 up vector.)

以下的視角系統設定取自 Dave Shreiner 發表的文章:

首先請計算出場景中所有物體的bounding sphere(碰撞球)。
它提供你兩個訊息: 球體中心 (令該點為 (c.x, c.y, c.z))，以及直徑 (我們叫它"diam" )。

接著，選定一個值作為近平面zNear。依照一般準則，我們會選一個比1大，但是很接近1的值。設定如下:

    zNear = 1.0;
    zFar = zNear + diam;

依此順序建構矩陣 (以平行投影來說)

    GLdouble left = c.x - diam;
    GLdouble right = c.x + diam;
    GLdouble bottom c.y - diam;
    GLdouble top = c.y + diam;

    glMatrixMode(GL_PROJECTION);
    glLoadIdentity();
    glOrtho(left, right, bottom, top, zNear, zFar);
    glMatrixMode(GL_MODELVIEW);
    glLoadIdentity();

此方法令物體置中，同時視窗合適地包住物體。(這兒假設視窗長寬比是1.0)。
如果視窗不是正方形，那先如上法計算出 left、right、bottom、與top的值，然後在呼叫glOrtho()之前加入以下代碼邏輯:


    GLdouble aspect = (GLdouble) windowWidth / windowHeight;
    if ( aspect &lt; 1.0 )
    {
        // 判斷視窗是狹長型還是寬扁型。
        bottom /= aspect;
        top /= aspect;
    }
    else
    {
       left *= aspect;
       right *= aspect;
   }


以上代碼應該能合宜地定位物件。如果還想要操弄物體(例如旋轉它)，那還需要加上一個視圖轉換(viewing transform)。

典型的視圖轉換都應該做在ModelView矩陣上，看起來大概如下:

```c++
    gluLookAt (0., 0., 2.*diam,
               c.x, c.y, c.z,
               0.0, 1.0, 0.0);
```

### 8.080 為什麼我的 gluLookAt() 故障了?

這通常肇因於錯誤的空間轉換。

假設你在投影矩陣上使用了 glPerspective() 並且給第三、四個參數傳入zNear、zFar，你必須把gluLookAt() 設在ModelView矩陣上，並且將幾何物體放在zNear與zFar之間才行。

當你試著想弄懂視圖轉換時，最好的辦法就是用簡單的代碼來做實驗。比方說，想盯著一個位於原點的單位球體看。
那建立如下轉換:

    glMatrixMode(GL_PROJECTION);
    glLoadIdentity();
    gluPerspective(50.0, 1.0, 3.0, 7.0);
    glMatrixMode(GL_MODELVIEW);
    glLoadIdentity();
    gluLookAt(0.0, 0.0, 5.0,
              0.0, 0.0, 0.0,
              0.0, 1.0, 0.0);

重點是投影轉換(Projection transform)與模型視圖轉換(ModelView transform) 之間的合作。

在這個例子中，投影轉換將視角(field of view)設定為50度，長寬比為1.0。近裁切平面位於眼睛前方3.0個單位，遠裁切平面則位於眼睛前方7.0個單位。這留下了4.0個單位的Z視體距離，有充足的空間含納單位球體。

模型視圖轉換則將眼睛位置安置於(0.0, 0.0, 5.0)，
並把瞄準點設為原點，也就是單位球體的中心。
請注意眼睛位置點與瞄準點之間的距離有5.0單位遠。這很重要，因為眼睛前方5.
0單位剛好位於Z視體的中間，就如我們剛剛在投影變換裡定義的。如果呼叫 gluLookAt() 時把眼睛置於 (0.0, 0.0, 1.0)，那眼睛距離原點就只有1.0單位。這長度不夠含納整個單位球體，球體就會被近平面zNear切掉。

同樣地，如果你把眼睛位置放在(0.0, 0.0, 10.0)，那麼距離瞄準點有10單位遠，
導致單位球體距離眼睛也是10單位遠，遠遠超過了遠平面zFar的7.0個單位。

如果你有些困惑，讀讀OpenGL紅皮書跟OpenGL規格書裡的空間轉換。一旦你弄懂了物體座標空間(object coordinate space)、眼座標空間(eye coordinate space)，與裁切座標空間(clip coordinate space) 後，上面的內容應該就會很清楚了。還有，寫小型的測試程式來做實驗。如果在主專案裡頭碰到麻煩，找不到正確的轉換，那嘗試用簡單的幾何圖形跟一支小小的程式來重現問題，是很好的學習方式。

### 8.090 我該如何令一個指定的點(XYZ) 出現在場景的中心呢?

最容易的辦法就是調用 gluLookAt() 了。
直接傳入特定點的座標 X, Y, Z 作為gluLookAt() 的第四、五、六個參數即可。

### 8.100 我在投影矩陣上呼叫 gluLookAt() 後，霧、貼圖、照明就全錯了。怎麼回事?

請看 8.030 的解釋。

