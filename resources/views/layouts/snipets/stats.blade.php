<!-- Hotjar Tracking Code for  -->
<script>
    (function (h, o, t, j, a, r) {
        h.hj = h.hj || function () {
            (h.hj.q = h.hj.q || []).push(arguments)
        };
        h._hjSettings = {
            hjid: parseInt('{{ env("HJ_HJID") }}'),
            hjsv: parseInt('{{ env("HJ_HJSV") }}'),
        };
        a = o.getElementsByTagName('head')[0];
        r = o.createElement('script');
        r.async = 1;
        r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
        a.appendChild(r);
    })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');

</script>

<!-- Facebook Pixel Code -->
<script>
    ! function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '4176955929036770');
    fbq('track', 'PageView');

</script>
<noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=4176955929036770&ev=PageView&noscript=1" /></noscript>
<!-- End Facebook Pixel Code -->

<script>
    ! function () {
        var analytics = window.analytics = window.analytics || [];
        if (!analytics.initialize)
            if (analytics.invoked) window.console && console.error && console.error("Segment snippet included twice.");
            else {
                analytics.invoked = !0;
                analytics.methods = ["trackSubmit", "trackClick", "trackLink", "trackForm", "pageview", "identify",
                    "reset", "group", "track", "ready", "alias", "debug", "page", "once", "off", "on",
                    "addSourceMiddleware", "addIntegrationMiddleware", "setAnonymousId", "addDestinationMiddleware"
                ];
                analytics.factory = function (e) {
                    return function () {
                        var t = Array.prototype.slice.call(arguments);
                        t.unshift(e);
                        analytics.push(t);
                        return analytics
                    }
                };
                for (var e = 0; e < analytics.methods.length; e++) {
                    var key = analytics.methods[e];
                    analytics[key] = analytics.factory(key)
                }
                analytics.load = function (key, e) {
                    var t = document.createElement("script");
                    t.type = "text/javascript";
                    t.async = !0;
                    t.src = "https://cdn.segment.com/analytics.js/v1/" + key + "/analytics.min.js";
                    var n = document.getElementsByTagName("script")[0];
                    n.parentNode.insertBefore(t, n);
                    analytics._loadOptions = e
                };
                analytics._writeKey = "c3oHcwrxC6BoOKNw4F7NaLCHxjvM0DdS";
                analytics.SNIPPET_VERSION = "4.13.2";
                analytics.load("c3oHcwrxC6BoOKNw4F7NaLCHxjvM0DdS");
                analytics.page();
            }
    }();

</script>
