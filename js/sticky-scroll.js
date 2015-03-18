window.onload=function() {

  // コンテンツ部分の高さ
  var contentHeight = jQuery("#content").height();
  // サイドバーの親要素の高さ
  var sidebarHeight = jQuery(".aside-wrapper").height();
  var w = jQuery(window);

  // サイドバーの親要素の高さがコンテンツ部分の高さより小さい時
  if(sidebarHeight < contentHeight) {

    // サイドバーの親要素の高さをコンテンツ部分の高さに合わせる
    jQuery("aside").css("height", contentHeight);

    // サイドバーを変数に代入
    var sidebarSub = jQuery(".aside-wrapper");
    // サイドバーを固定したい位置を取得し変数に代入
　　var sidebarScrollStop
    = jQuery("header").height() + jQuery(".aside-wrapper").height() + 20 + 20
    - w.height();
    // サイドバーの固定を解除したい位置を取得し変数に代入
    var sidebarScrollStart
    = jQuery("header").height() + jQuery("#content").height() + 20
    - w.height();

    // ウィンドウがスクロールされた時に処理を実行
    w.scroll(function() {

      // 「scrollTopの位置」が「サイドバーを固定したい位置」より大きく、
      // 「サイドバーの固定を解除したい位置」より小さい時
      if(sidebarScrollStop < w.scrollTop()
      && w.scrollTop() < sidebarScrollStart) {

        // サイドバーを固定する処理
        sidebarSub.css({"position": "fixed", "bottom": "0"});

      // 「scrollTopの位置」が「サイドバーの固定を解除したい位置」より大きい時
      } else if(w.scrollTop() >= sidebarScrollStart) {

        // サイドバーの固定を解除する処理
        sidebarSub.css({"position": "absolute", "bottom": "20px"});

      // それ以外のとき
      // （「scrollTopの位置」が「サイドバーを固定したい位置」より小さい時）
      } else {

        // サイドバーを通常の位置に戻す
        sidebarSub.css("position", "static");

      }

    });

  } 

}