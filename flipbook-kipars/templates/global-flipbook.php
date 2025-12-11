<?php
/**
 * Global flipbook interface template for testing purposes.
 *
 * @var string $engine_base_url Base URL for shared assets (ending with /).
 * @var string $book_assets_url Base URL for book-specific assets (ending with /).
 * @var string $book_title       Title of the selected book.
 * @var string $engine_version   Cache-busting version string.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

nocache_headers();
header( 'X-Robots-Tag: noindex, nofollow', true );

$engine_base_url = trailingslashit( $engine_base_url );
$book_assets_url = trailingslashit( $book_assets_url );
$engine_version  = sanitize_text_field( $engine_version );
$book_title      = wp_strip_all_tags( $book_title );
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo esc_html( $book_title ); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="monitor-signature" content="monitor:player:html5">
	<meta name="keywords" content="" />
	<meta name="og:image" content="<?php echo esc_url( $book_assets_url . 'files/shot.png' ); ?>" />
	<meta property="og:image" content="<?php echo esc_url( $book_assets_url . 'files/shot.png' ); ?>" />
	<meta property="og:title" content="<?php echo esc_attr( $book_title ); ?>" />
	<meta property="og:description" content="" />
	<meta name="Description" content="">
	<link rel="image_src" href="<?php echo esc_url( $book_assets_url . 'files/shot.png' ); ?>" />
	<meta name="Generator" content="FlipPDFPlus for win">
	<meta name="robots" content="noindex,nofollow">
</head>
<body>
	<div id="tmpLoading" style="width: 100%; height: 100%; position: absolute; z-index: -2;background:#323232;"></div>
	<script type="text/javascript">
	(function() {
	  var engineBase = <?php echo wp_json_encode( $engine_base_url ); ?>;
	  var bookBase = <?php echo wp_json_encode( $book_assets_url ); ?>;
	  var assetVersion = <?php echo wp_json_encode( $engine_version ); ?>;
	  var isMobile = /Mobi|Android|iPhone|iPad|iPod/i.test(navigator.userAgent) || Math.min(window.innerWidth, screen.width || window.innerWidth) <= 812;
	  var head = document.getElementsByTagName('head')[0];
	  var body = document.body;
	  function addScript(src, inline) {
	    if (inline) {
	      var sinline = document.createElement('script');
	      sinline.type = 'text/javascript';
	      sinline.text = src;
	      body.appendChild(sinline);
	      return sinline;
	    }
	    var s = document.createElement('script');
	    s.src = src;
	    s.type = 'text/javascript';
	    s.defer = true;
	    body.appendChild(s);
	    return s;
	  }
	  function addCss(href) {
	    var l = document.createElement('link');
	    l.rel = 'stylesheet';
	    l.href = href;
	    head.appendChild(l);
	    return l;
	  }
	  function sharedAsset(path, withVersion) {
	    return engineBase + path + (withVersion ? ('?v=' + assetVersion) : '');
	  }

	  function bookAsset(path, withVersion) {
	    return bookBase + path + (withVersion ? ('?v=' + assetVersion) : '');
	  }

	  if (isMobile) {
	    addScript(sharedAsset('javascript/jquery-3.5.1.min.js', true));
	    addScript(sharedAsset('javascript/config.js', true));
	    addScript(sharedAsset('javascript/LoadingJS.js', true));
	    addScript(sharedAsset('javascript/resource_skeleton.js', true));
	    addScript(sharedAsset('javascript/main_preview.js', true));
	    addScript(sharedAsset('javascript/BookPreview.js', true));
	    addScript(sharedAsset('javascript/editor.js', true));
	    addScript(bookAsset('files/search/book_config.js'));
	    addScript('var sendvisitinfo = function (type, page) { };', true);
	    addScript('window.readerConfigLoaded = true;', true);
	    addScript("(function(){\n      function attach(){\n        try{\n          var lb = window.jQuery && jQuery('.slidePreToolbar');\n          var rb = window.jQuery && jQuery('.slideNextToolbar');\n          if (lb && lb.length && typeof window.previousPageFun==='function'){ lb.off('click.flip-fb').on('click.flip-fb', function(){ try{ window.previousPageFun('click'); }catch(e){} }); }\n          if (rb && rb.length && typeof window.nextPageFun==='function'){ rb.off('click.flip-fb').on('click.flip-fb', function(){ try{ window.nextPageFun('click'); }catch(e){} }); }\n        }catch(e){}\n      }\n      var tries=0; var t=setInterval(function(){ attach(); tries++; if (tries>20) clearInterval(t); }, 300);\n      if (document.readyState==='complete' || document.readyState==='interactive'){ setTimeout(attach, 1000); } else { document.addEventListener('DOMContentLoaded', function(){ setTimeout(attach, 500); }); }\n    })();", true);
	  } else {
	    addCss(sharedAsset('style/FlipBookPlugins.min.css'));
	    addCss(sharedAsset('style/template.css'));
	    addCss(sharedAsset('style/hiSlider2.min.css'));
	    addCss(sharedAsset('style/scrollbar.css'));
	    addCss(sharedAsset('style/style.css'));
	    addCss(sharedAsset('style/player.css'));
	    addCss(sharedAsset('style/phoneTemplate.css'));
	    addScript(sharedAsset('javascript/jquery-3.5.1.min.js', true));
	    addScript(sharedAsset('javascript/config.js', true));
	    addScript(sharedAsset('javascript/LoadingJS.js', true));
	    addScript(sharedAsset('javascript/main_preview.js', true));
	    addScript(sharedAsset('javascript/BookPreview.js', true));
	    addScript(sharedAsset('javascript/editor.js', true));
	    addScript(bookAsset('files/search/book_config.js', true));
	    addScript('var sendvisitinfo = function (type, page) { };', true);
	    addScript(sharedAsset('javascript/FlipBookPlugins.min.js'));
	    addScript(sharedAsset('javascript/flipHtml5.hiSlider2.min.js'));
	    addScript(sharedAsset('javascript/pdf.js'));
	    addScript('if (window.pdfjsLib) { pdfjsLib.GlobalWorkerOptions.workerSrc = sharedAsset("javascript/pdf.worker.js"); }', true);
	  }
	})();
	</script>

	<style>
	.flipbook-mobile-controls{position:fixed;left:0;right:0;bottom:16px;display:flex;justify-content:center;gap:16px;z-index:9999;pointer-events:none}
	.flipbook-mobile-controls .button{background:#eee;border-radius:999px;padding:10px 16px;display:flex;align-items:center;gap:8px;font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#333;box-shadow:0 4px 10px rgba(0,0,0,0.2);pointer-events:auto;cursor:pointer;transition:transform .2s ease,box-shadow .2s ease}
	.flipbook-mobile-controls .button:active{transform:scale(0.96);box-shadow:0 2px 6px rgba(0,0,0,0.2)}
	.flipbook-mobile-controls img{width:24px;height:24px;pointer-events:none}
	@media (min-width:813px){.flipbook-mobile-controls{display:none}}
	</style>

	<script type="text/javascript">
	(function(){
	  function __fb_tryNav(dir, attempt){
	    attempt = attempt || 0;
	    try {
	      if (dir === 'next') {
	        if (typeof window.nextPageFun === 'function') return window.nextPageFun('postMessage');
	        if (window.BookInfo && typeof BookInfo.getBook === 'function') {
	          var bk = BookInfo.getBook();
	          if (bk && typeof bk.nextPage === 'function') return bk.nextPage();
	          if (bk && typeof bk.gotoNextPage === 'function') return bk.gotoNextPage();
	        }
	      } else if (dir === 'prev') {
	        if (typeof window.previousPageFun === 'function') return window.previousPageFun('postMessage');
	        if (window.BookInfo && typeof BookInfo.getBook === 'function') {
	          var bk2 = BookInfo.getBook();
	          if (bk2 && typeof bk2.previousPage === 'function') return bk2.previousPage();
	          if (bk2 && typeof bk2.gotoPrevPage === 'function') return bk2.gotoPrevPage();
	        }
	      }
	    } catch(e){}
	    if (attempt < 20) setTimeout(function(){ __fb_tryNav(dir, attempt + 1); }, 150);
	  }

	  window.__flipbookNavigate = __fb_tryNav;

	  function __fb_handleMsg(ev){
	    var d = ev && ev.data; if (!d) return;
	    if (typeof d === 'string') {
	      try { var j = JSON.parse(d); if (j && j.type === 'flipbook-nav' && (j.dir === 'next' || j.dir === 'prev')) return __fb_tryNav(j.dir); } catch(e){}
	      if (d === 'flipbook-next') return __fb_tryNav('next');
	      if (d === 'flipbook-prev') return __fb_tryNav('prev');
	    } else if (d && d.type === 'flipbook-nav' && (d.dir === 'next' || d.dir === 'prev')) {
	      return __fb_tryNav(d.dir);
	    }
	  }
	  if (window.addEventListener) window.addEventListener('message', __fb_handleMsg);
	  var __prevOnMsg = window.onmessage;
	  window.onmessage = function(ev){ try { __fb_handleMsg(ev); } catch(e){} if (typeof __prevOnMsg === 'function') try { __prevOnMsg.call(window, ev); } catch(e){} };

	  function __fb_pingReady(attempt){
	    attempt = attempt || 0;
	    try { if (window.parent) window.parent.postMessage({ type: 'flipbook-ready' }, '*'); } catch(e){}
	    if (attempt < 5) setTimeout(function(){ __fb_pingReady(attempt + 1); }, 500);
	  }
	  if (document.readyState === 'complete' || document.readyState === 'interactive') {
	    setTimeout(__fb_pingReady, 300);
	  } else {
	    document.addEventListener('DOMContentLoaded', function(){ setTimeout(__fb_pingReady, 300); });
	  }

	  function __fb_insertMobileControls(){
	    var isTouch = /Mobi|Android|iPhone|iPad|iPod/i.test(navigator.userAgent) || Math.min(window.innerWidth, screen.width || window.innerWidth) <= 812;
	    if (!isTouch) return;
	    if (document.querySelector('.flipbook-mobile-controls')) return;
	    var wrap = document.createElement('div');
	    wrap.className = 'flipbook-mobile-controls';
	    function makeButton(dir, label, icon){
	      var btn = document.createElement('div');
	      btn.className = 'button flipbook-mobile-' + dir;
	      btn.innerHTML = '<img src="' + icon + '" alt="" /><span>' + label + '</span><canvas width="40" height="16" class="divReflect"></canvas>';
	      btn.addEventListener('click', function(ev){ ev.preventDefault(); try{ window.__flipbookNavigate && window.__flipbookNavigate(dir); }catch(e){} });
	      return btn;
	    }
	    var prevIcon = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAAf0lEQVR4AezQWwqAIBCF4WpL7n8Jrqn4X0TQccaTEUHCQfHyOcyxPTR+uDT2/VaklM5STmARqngW5V8XVlAXVtEh3EPZswJWp9sKHteXlHUDr0AppIFzzjsHd9PAgCvwLmzhfGiFN3VMmEsgzEqGMKCKu7CKh2AFD8PgM/kefAEAAP//H1xG0wAAAAZJREFUAwCVKTgtWSDnGQAAAABJRU5ErkJggg==';
	    var nextIcon = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAAiElEQVR4AezQ0QnAIAwE0LYruf8IztRyP3IQo5dYoR8VAhHNS8h1bDo/3Bb7jVWUUu420iQJT6ziYRiDKngKVnADYxovAHLgH985NzA/KrmHL8No3sNfgWutJxpwLMM9FA0MjI9eoIAD//jOuYH5cZSPUNSl4BmaghU0DKtoGEaBGqkdK/g2+AEAAP//1+o4MgAAAAZJREFUAwCVKTgtWSDnGQAAAABJRU5ErkJggg==';
	    wrap.appendChild(makeButton('prev', 'Previous Page', prevIcon));
	    wrap.appendChild(makeButton('next', 'Next Page', nextIcon));
	    document.body.appendChild(wrap);
	  }
	  if (document.readyState === 'complete') {
	    __fb_insertMobileControls();
	  } else {
	    document.addEventListener('DOMContentLoaded', __fb_insertMobileControls);
	  }
	})();
	</script>
</body>
</html>
