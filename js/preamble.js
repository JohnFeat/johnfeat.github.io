var XF = window.XF || {}; !function (e) { var d = 0; e.console || (e.console = {}); e.console.log && !e.console.debug && (e.console.debug = e.console.log); var f = "assert clear count debug dir dirxml error getFirebugElement group groupCollapsed groupEnd info log notifyFirebug profile profileEnd time timeEnd trace warn".split(" "); for (d = 0; d < f.length; ++d)e.console[f[d]] || (e.console[f[d]] = function () { }) }(window);
!function (e, d) {
    var f = d.documentElement, h = f.getAttribute("data-cookie-prefix") || "", k = f.getAttribute("data-app"), l = "true" === f.getAttribute("data-logged-in"); f.addEventListener("error", function (a) { a = a.target; switch (a.getAttribute("data-onerror")) { case "hide": a.style.display = "none"; break; case "hide-parent": a.parentNode.style.display = "none" } }, !0); XF.Feature = function () {
        function a(a) {
            var b = f.className; g && (b = b.replace(/(^|\s)has-no-js($|\s)/, "$1has-js$2"), g = !1); a.length && (b += " " + a.join(" ")); f.className =
                b
        } var b = {
            touchevents: function () { return "ontouchstart" in e || e.DocumentTouch && d instanceof DocumentTouch }, passiveeventlisteners: function () { var a = !1; try { var b = Object.defineProperty({}, "passive", { get: function () { a = !0 } }), c = function () { }; e.addEventListener("test", c, b); e.removeEventListener("test", c, b) } catch (m) { } return a }, hiddenscroll: function () {
                var a = d.body, b = !1; a || (a = d.createElement("body"), d.body = a, b = !0); var c = d.createElement("div"); c.style.width = "100px"; c.style.height = "100px"; c.style.overflow = "scroll";
                c.style.position = "absolute"; c.style.top = "-9999px"; a.appendChild(c); var e = c.offsetWidth === c.clientWidth; b ? a.parentNode.removeChild(a) : c.parentNode.removeChild(c); return e
            }
        }, c = {}, g = !0; return {
            runTests: function () { var e = [], d; for (d in b) if (b.hasOwnProperty(d) && "undefined" === typeof c[d]) { var f = !!b[d](); e.push("has-" + (f ? "" : "no-") + d); c[d] = f } a(e) }, runTest: function (b, d) { d = !!d(); a(["has-" + (d ? "" : "no-") + b]); c[b] = d }, has: function (a) {
                return "undefined" === typeof c[a] ? (console.error("Asked for unknown test results: " +
                    a), !1) : c[a]
            }
        }
    }(); XF.Feature.runTests(); "public" !== k || l || function () { var a = (a = (a = (new RegExp("(^| )" + h + "notice_dismiss=([^;]+)(;|$)")).exec(d.cookie)) ? decodeURIComponent(a[2]) : null) ? a.split(",") : []; for (var b, c = [], e = 0; e < a.length; e++)b = parseInt(a[e], 10), 0 !== b && c.push('.notice[data-notice-id="' + b + '"]'); c.length && (a = c.join(", ") + " { display: none !important } ", b = d.createElement("style"), b.type = "text/css", b.innerHTML = a, d.head.appendChild(b)) }(); (function () {
        var a = navigator.userAgent.toLowerCase(), b; if (b =
            /trident\/.*rv:([0-9.]+)/.exec(a)) b = { browser: "msie", version: parseFloat(b[1]) }; else { b = /(msie)[ \/]([0-9\.]+)/.exec(a) || /(edge)[ \/]([0-9\.]+)/.exec(a) || /(chrome)[ \/]([0-9\.]+)/.exec(a) || /(webkit)[ \/]([0-9\.]+)/.exec(a) || /(opera)(?:.*version|)[ \/]([0-9\.]+)/.exec(a) || 0 > a.indexOf("compatible") && /(mozilla)(?:.*? rv:([0-9\.]+)|)/.exec(a) || []; if ("webkit" == b[1] && a.indexOf("safari")) { var c = /version[ \/]([0-9\.]+)/.exec(a); c && (b = [b[0], "safari", c[1]]) } b = { browser: b[1] || "", version: parseFloat(b[2]) || 0 } } b.browser &&
                (b[b.browser] = !0); c = ""; var d = null, e; if (/(ipad|iphone|ipod)/.test(a)) { if (c = "ios", e = /os ([0-9_]+)/.exec(a)) d = parseFloat(e[1].replace("_", ".")) } else (e = /android[ \/]([0-9\.]+)/.exec(a)) ? (c = "android", d = parseFloat(e[1])) : /windows /.test(a) ? c = "windows" : /linux/.test(a) ? c = "linux" : /mac os/.test(a) && (c = "mac"); b.os = c; b.osVersion = d; c && (b[c] = !0); XF.browser = b
    })()
}(window, document);