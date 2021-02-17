(function (e) {
    function t(t) {
        for (var c, a, o = t[0], s = t[1], u = t[2], d = 0, f = []; d < o.length; d++) a = o[d], Object.prototype.hasOwnProperty.call(i, a) && i[a] && f.push(i[a][0]), i[a] = 0;
        for (c in s) Object.prototype.hasOwnProperty.call(s, c) && (e[c] = s[c]);
        l && l(t);
        while (f.length) f.shift()();
        return r.push.apply(r, u || []), n()
    }

    function n() {
        for (var e, t = 0; t < r.length; t++) {
            for (var n = r[t], c = !0, a = 1; a < n.length; a++) {
                var o = n[a];
                0 !== i[o] && (c = !1)
            }
            c && (r.splice(t--, 1), e = s(s.s = n[0]))
        }
        return e
    }

    var c = {}, a = {app: 0}, i = {app: 0}, r = [];

    function o(e) {
        return s.p + "js/" + ({}[e] || e) + "." + {
            "chunk-0bf58be1": "bed04df9",
            "chunk-10caa551": "f971d6b9",
            "chunk-25ffaaa9": "176390ec",
            "chunk-2bed2a16": "2a6643f8",
            "chunk-2d0a3598": "d3707424",
            "chunk-2d0a4b20": "54f50977",
            "chunk-2d0b2591": "73a2328b",
            "chunk-2d0be70b": "94544af2",
            "chunk-2d0d6ed6": "a71da5b9",
            "chunk-2d0e6cb2": "af1b1e9c",
            "chunk-2d20f552": "5ef8a07d",
            "chunk-34e6260e": "dbc80684",
            "chunk-404c416a": "de274982",
            "chunk-4cdb3656": "bccc0d69",
            "chunk-5c260a89": "015f4622",
            "chunk-2e648a65": "d5d2f03f",
            "chunk-aaf5577e": "2d2ac312",
            "chunk-b05c1454": "f9fd0d95",
            "chunk-bdfaf54e": "8f2b0c94",
            "chunk-c5cce2d2": "c844dfb2",
            "chunk-e1900780": "f95eb675",
            "chunk-f2b75a2a": "ac679643",
            "chunk-2d216214": "e39f12c4",
            "chunk-2d216257": "256ee085",
            "chunk-6b8ec7c6": "b6ae92be"
        }[e] + ".js"
    }

    function s(t) {
        if (c[t]) return c[t].exports;
        var n = c[t] = {i: t, l: !1, exports: {}};
        return e[t].call(n.exports, n, n.exports, s), n.l = !0, n.exports
    }

    s.e = function (e) {
        var t = [], n = {
            "chunk-10caa551": 1,
            "chunk-25ffaaa9": 1,
            "chunk-2bed2a16": 1,
            "chunk-404c416a": 1,
            "chunk-4cdb3656": 1,
            "chunk-aaf5577e": 1,
            "chunk-b05c1454": 1,
            "chunk-bdfaf54e": 1,
            "chunk-e1900780": 1,
            "chunk-f2b75a2a": 1
        };
        a[e] ? t.push(a[e]) : 0 !== a[e] && n[e] && t.push(a[e] = new Promise((function (t, n) {
            for (var c = "css/" + ({}[e] || e) + "." + {
                "chunk-0bf58be1": "31d6cfe0",
                "chunk-10caa551": "177a7996",
                "chunk-25ffaaa9": "7121725c",
                "chunk-2bed2a16": "5a163090",
                "chunk-2d0a3598": "31d6cfe0",
                "chunk-2d0a4b20": "31d6cfe0",
                "chunk-2d0b2591": "31d6cfe0",
                "chunk-2d0be70b": "31d6cfe0",
                "chunk-2d0d6ed6": "31d6cfe0",
                "chunk-2d0e6cb2": "31d6cfe0",
                "chunk-2d20f552": "31d6cfe0",
                "chunk-34e6260e": "31d6cfe0",
                "chunk-404c416a": "1d88f438",
                "chunk-4cdb3656": "2681b4d1",
                "chunk-5c260a89": "31d6cfe0",
                "chunk-2e648a65": "31d6cfe0",
                "chunk-aaf5577e": "8df121b1",
                "chunk-b05c1454": "a35e9e26",
                "chunk-bdfaf54e": "dcbd3a71",
                "chunk-c5cce2d2": "31d6cfe0",
                "chunk-e1900780": "3178a710",
                "chunk-f2b75a2a": "35f4e089",
                "chunk-2d216214": "31d6cfe0",
                "chunk-2d216257": "31d6cfe0",
                "chunk-6b8ec7c6": "31d6cfe0"
            }[e] + ".css", i = s.p + c, r = document.getElementsByTagName("link"), o = 0; o < r.length; o++) {
                var u = r[o], d = u.getAttribute("data-href") || u.getAttribute("href");
                if ("stylesheet" === u.rel && (d === c || d === i)) return t()
            }
            var f = document.getElementsByTagName("style");
            for (o = 0; o < f.length; o++) {
                u = f[o], d = u.getAttribute("data-href");
                if (d === c || d === i) return t()
            }
            var l = document.createElement("link");
            l.rel = "stylesheet", l.type = "text/css", l.onload = t, l.onerror = function (t) {
                var c = t && t.target && t.target.src || i,
                    r = new Error("Loading CSS chunk " + e + " failed.\n(" + c + ")");
                r.code = "CSS_CHUNK_LOAD_FAILED", r.request = c, delete a[e], l.parentNode.removeChild(l), n(r)
            }, l.href = i;
            var h = document.getElementsByTagName("head")[0];
            h.appendChild(l)
        })).then((function () {
            a[e] = 0
        })));
        var c = i[e];
        if (0 !== c) if (c) t.push(c[2]); else {
            var r = new Promise((function (t, n) {
                c = i[e] = [t, n]
            }));
            t.push(c[2] = r);
            var u, d = document.createElement("script");
            d.charset = "utf-8", d.timeout = 120, s.nc && d.setAttribute("nonce", s.nc), d.src = o(e);
            var f = new Error;
            u = function (t) {
                d.onerror = d.onload = null, clearTimeout(l);
                var n = i[e];
                if (0 !== n) {
                    if (n) {
                        var c = t && ("load" === t.type ? "missing" : t.type), a = t && t.target && t.target.src;
                        f.message = "Loading chunk " + e + " failed.\n(" + c + ": " + a + ")", f.name = "ChunkLoadError", f.type = c, f.request = a, n[1](f)
                    }
                    i[e] = void 0
                }
            };
            var l = setTimeout((function () {
                u({type: "timeout", target: d})
            }), 12e4);
            d.onerror = d.onload = u, document.head.appendChild(d)
        }
        return Promise.all(t)
    }, s.m = e, s.c = c, s.d = function (e, t, n) {
        s.o(e, t) || Object.defineProperty(e, t, {enumerable: !0, get: n})
    }, s.r = function (e) {
        "undefined" !== typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {value: "Module"}), Object.defineProperty(e, "__esModule", {value: !0})
    }, s.t = function (e, t) {
        if (1 & t && (e = s(e)), 8 & t) return e;
        if (4 & t && "object" === typeof e && e && e.__esModule) return e;
        var n = Object.create(null);
        if (s.r(n), Object.defineProperty(n, "default", {
            enumerable: !0,
            value: e
        }), 2 & t && "string" != typeof e) for (var c in e) s.d(n, c, function (t) {
            return e[t]
        }.bind(null, c));
        return n
    }, s.n = function (e) {
        var t = e && e.__esModule ? function () {
            return e["default"]
        } : function () {
            return e
        };
        return s.d(t, "a", t), t
    }, s.o = function (e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, s.p = "/", s.oe = function (e) {
        throw console.error(e), e
    };
    var u = window["webpackJsonp"] = window["webpackJsonp"] || [], d = u.push.bind(u);
    u.push = t, u = u.slice();
    for (var f = 0; f < u.length; f++) t(u[f]);
    var l = d;
    r.push([0, "chunk-vendors"]), n()
})({
    0: function (e, t, n) {
        e.exports = n("56d7")
    }, "07dc": function (e, t, n) {
        e.exports = n.p + "img/upc-scan.b91abf32.svg"
    }, 5188: function (e, t, n) {
        e.exports = n.p + "img/gear-fill.e61af72a.svg"
    }, "546e": function (e, t, n) {
    }, "56d7": function (e, t, n) {
        "use strict";
        n.r(t);
        n("e260"), n("e6cf"), n("cca6"), n("a79d");
        var c = n("2b0e"), a = n("2f62"), i = function () {
                var e = this, t = e.$createElement, n = e._self._c || t;
                return n("div", {attrs: {id: "app"}}, [n("navigationsleiste"), this.$store.state.token && !this.$store.state.verification ? n("div", [e._v(" Bitte verifizieren sie ihre Email Addresse. "), n("a", {attrs: {href: e.sendVerificationEmail}}, [e._v("Email erneut senden")])]) : e._e(), n("router-view", {staticClass: "router-view"})], 1)
            }, r = [], o = function () {
                var e = this, t = e.$createElement, c = e._self._c || t;
                return c("nav", {
                    staticClass: "sticky-top",
                    attrs: {id: "navbar"}
                }, [c("div", {staticClass: "navbar-mobile container"}, [c("footer", {staticClass: "footer row justify-content-between"}, [c("router-link", {attrs: {to: "/menu"}}, [e.homeActive ? e._e() : c("img", {
                    staticClass: "icon-mobile",
                    attrs: {src: n("750c"), width: "30"},
                    on: {
                        click: function (t) {
                            e.homeActive = !0, e.plusActive = !1, e.gearActive = !1, e.qrActive = !1
                        }
                    }
                }), e.homeActive ? c("img", {
                    staticClass: "icon-mobile",
                    attrs: {src: n("b93c"), width: "30"}
                }) : e._e()]), e._m(0), c("router-link", {attrs: {to: "/scan"}}, [e.qrActive ? e._e() : c("img", {
                    staticClass: "icon-mobile",
                    attrs: {src: n("9d66"), width: "30"},
                    on: {
                        click: function (t) {
                            e.qrActive = !0, e.plusActive = !1, e.gearActive = !1, e.homeActive = !1
                        }
                    }
                }), e.qrActive ? c("img", {
                    staticClass: "icon-mobile",
                    attrs: {src: n("07dc"), width: "30"}
                }) : e._e()]), c("router-link", {attrs: {to: "/user/settings"}}, [e.gearActive ? e._e() : c("img", {
                    staticClass: "icon-mobile",
                    attrs: {src: n("f571"), width: "30"},
                    on: {
                        click: function (t) {
                            e.gearActive = !0, e.plusActive = !1, e.homeActive = !1, e.qrActive = !1
                        }
                    }
                }), e.gearActive ? c("img", {
                    staticClass: "icon-mobile",
                    attrs: {src: n("5188"), width: "30"}
                }) : e._e()]), c("router-link", {
                    staticClass: "font-weight-bold",
                    attrs: {to: "/login"}
                }, [c("i", {staticClass: "icon-mobile fas fa-user"})])], 1)]), c("div", {staticClass: "navbar border"}, [c("header", {
                    staticClass: "container row",
                    attrs: {id: "header"}
                }, [e._m(1), c("div", {
                    staticClass: "col-4 font-weight-bold",
                    attrs: {id: "nav-points"}
                }, [c("h4", [e._v(e._s(this.$store.state.points))])]), c("div", {
                    staticClass: "col-4",
                    attrs: {id: "icons-header"}
                }, [c("router-link", {attrs: {to: "/menu"}}, [e.homeActive ? e._e() : c("img", {
                    staticClass: "icon",
                    attrs: {src: n("750c"), width: "25"},
                    on: {
                        click: function (t) {
                            e.homeActive = !0, e.gearActive = !1, e.qrActive = !1
                        }
                    }
                }), e.homeActive ? c("img", {
                    staticClass: "icon",
                    attrs: {src: n("b93c"), width: "25"}
                }) : e._e()]), c("router-link", {attrs: {to: "/scan"}}, [e.qrActive ? e._e() : c("img", {
                    staticClass: "icon",
                    attrs: {src: n("9d66"), width: "25"},
                    on: {
                        click: function (t) {
                            e.qrActive = !0, e.gearActive = !1, e.homeActive = !1
                        }
                    }
                }), e.qrActive ? c("img", {
                    staticClass: "icon",
                    attrs: {src: n("07dc"), width: "25"}
                }) : e._e()]), c("router-link", {attrs: {to: "/user/settings/profile"}}, [e.gearActive ? e._e() : c("img", {
                    staticClass: "icon",
                    attrs: {src: n("f571"), width: "25"},
                    on: {
                        click: function (t) {
                            e.gearActive = !0, e.homeActive = !1, e.qrActive = !1
                        }
                    }
                }), e.gearActive ? c("img", {
                    staticClass: "icon",
                    attrs: {src: n("5188"), width: "25"}
                }) : e._e()]), c("router-link", {
                    staticClass: "font-weight-bold",
                    attrs: {to: "/login"}
                }, [c("i", {staticClass: "icon fas fa-user"})])], 1)])])])
            }, s = [function () {
                var e = this, t = e.$createElement, c = e._self._c || t;
                return c("div", [c("img", {
                    staticClass: "icon-mobile",
                    attrs: {
                        src: n("d99e"),
                        width: "30",
                        type: "button",
                        "data-toggle": "modal",
                        "data-target": "#exampleModalCenter"
                    }
                })])
            }, function () {
                var e = this, t = e.$createElement, c = e._self._c || t;
                return c("div", {staticClass: "col-4"}, [c("a", {attrs: {href: "/"}}, [c("img", {
                    attrs: {
                        src: n("bf1d"),
                        width: "150"
                    }
                })])])
            }], u = {
                name: "Navigationsleiste", components: {}, data: function () {
                    return {homeActive: !1, qrActive: !1, gearActive: !1}
                }
            }, d = u, f = (n("9ae2"), n("2877")), l = Object(f["a"])(d, o, s, !1, null, "1ed99c90", null), h = l.exports,
            m = n("bc3a"), p = n.n(m), b = {
                name: "App", components: {Navigationsleiste: h}, created: function () {
                    JSON.parse(sessionStorage.getItem("user")).token && this.$store.commit("setToken", JSON.parse(sessionStorage.getItem("user")).token), document.querySelector(":root").style.setProperty("--store-primary", this.$store.state.design.colorMain)
                }, methods: {
                    sendVerificationEmail: function () {
                        p.a.post(this.$store.state.url + "/sendEmail", {hash: this.$store.state.token}).catch((function (e) {
                            return console.error(e)
                        }))
                    }
                }
            }, k = b, v = (n("5c0b"), Object(f["a"])(k, i, r, !1, null, null, null)), g = v.exports,
            A = (n("d3b7"), n("8c4f"));
        c["a"].use(A["a"]);
        var y = [{
            path: "/reset-password", name: "ResetPassword", component: function () {
                return n.e("chunk-2d0a4b20").then(n.bind(null, "0813"))
            }
        }, {
            path: "/terms-and-service", name: "TermsAndService", component: function () {
                return n.e("chunk-2d0e6cb2").then(n.bind(null, "99ea"))
            }
        }, {
            path: "/terms-and-service-company", name: "TermsAndServiceCompany", component: function () {
                return n.e("chunk-2d20f552").then(n.bind(null, "b2d0"))
            }
        }, {
            path: "/login", name: "LoginUser", component: function () {
                return n.e("chunk-2d0be70b").then(n.bind(null, "2fef"))
            }
        }, {
            path: "/register", name: "RegisterUser", component: function () {
                return n.e("chunk-0bf58be1").then(n.bind(null, "1e7f"))
            }
        }, {
            path: "/register/company", name: "RegisterCompany", component: function () {
                return n.e("chunk-2d0d6ed6").then(n.bind(null, "7546"))
            }
        }, {
            path: "/scan", name: "QrCodeScanner", component: function () {
                return Promise.all([n.e("chunk-5c260a89"), n.e("chunk-2e648a65")]).then(n.bind(null, "a1ef"))
            }
        }, {
            path: "/menu", name: "RabattMenu", component: function () {
                return n.e("chunk-f2b75a2a").then(n.bind(null, "6d3f"))
            }
        }, {
            path: "/inventar", name: "RabattInventar", component: function () {
                return n.e("chunk-b05c1454").then(n.bind(null, "f01d"))
            }
        }, {
            path: "/user/settings", name: "UserSettings", component: function () {
                return n.e("chunk-4cdb3656").then(n.bind(null, "3a73"))
            }, children: [{
                path: "profile", name: "Profile", component: function () {
                    return n.e("chunk-aaf5577e").then(n.bind(null, "72eb"))
                }
            }, {
                path: "info", name: "Info", component: function () {
                    return n.e("chunk-bdfaf54e").then(n.bind(null, "2e4e"))
                }
            }, {
                path: "help", name: "Help", component: function () {
                    return n.e("chunk-10caa551").then(n.bind(null, "3b84"))
                }
            }, {
                path: "feedback", name: "Feedback", component: function () {
                    return n.e("chunk-2d0b2591").then(n.bind(null, "2470"))
                }
            }]
        }, {
            path: "/company/settings", name: "CompanySettingsMobile", component: function () {
                return n.e("chunk-404c416a").then(n.bind(null, "ae6c"))
            }, children: [{
                path: "profile", name: "CompanyProfile", component: function () {
                    return n.e("chunk-25ffaaa9").then(n.bind(null, "855b"))
                }
            }, {
                path: "design", name: "Design", component: function () {
                    return n.e("chunk-34e6260e").then(n.bind(null, "6ead"))
                }
            }, {
                path: "flyer", name: "Flyer", component: function () {
                    return n.e("chunk-2bed2a16").then(n.bind(null, "f200"))
                }
            }, {
                path: "location", name: "Location", component: function () {
                    return n.e("chunk-e1900780").then(n.bind(null, "a73d"))
                }
            }, {
                path: "staff", name: "Staff", component: function () {
                    return n.e("chunk-c5cce2d2").then(n.bind(null, "25d3"))
                }
            }, {
                path: "statistics", name: "Statistics", component: function () {
                    return n.e("chunk-2d0a3598").then(n.bind(null, "0299"))
                }
            }]
        }], w = new A["a"]({routes: y}), C = w, _ = (n("f9e3"), n("4989"), n("15f5"), n("7051"), void 0);
        c["a"].use(a["a"]), c["a"].config.productionTip = !1;
        var S = new a["a"].Store({
            state: {
                url: "https://freepoint.htl3r.com/api",
                token: "",
                verification: !1,
                points: 0,
                design: {colorMain: "#10cdb7"}
            }, mutations: {
                setToken: function (e, t) {
                    e.token = t
                }, setVerfification: function (e, t) {
                    e.verification = t
                }, increment: function (e) {
                    e.points++
                }, add: function (e, t) {
                    e.points += t
                }, setPoints: function (e, t) {
                    e.points = t
                }, setColorMain: function (e, t) {
                    e.design.colorMain = t
                }
            }
        });
        C.beforeEach((function (e, t, n) {
            S.state.token && p.a.post(_.$store.state.url + "/checkLogin", {hash: _.$store.state.token}).then((function (e) {
                e.data.valid ? _.$store.commit("setVerfification", e.data.isVerified) : _.$store.commit("setToken", "")
            })).catch((function (e) {
                console.error(e), _.$store.commit("setToken", "")
            })), n()
        })), new c["a"]({
            router: C, store: S, render: function (e) {
                return e(g)
            }
        }).$mount("#app")
    }, "5c0b": function (e, t, n) {
        "use strict";
        var c = n("9c0c"), a = n.n(c);
        a.a
    }, "750c": function (e, t, n) {
        e.exports = n.p + "img/house.d5b4b4ac.svg"
    }, "9ae2": function (e, t, n) {
        "use strict";
        var c = n("546e"), a = n.n(c);
        a.a
    }, "9c0c": function (e, t, n) {
    }, "9d66": function (e, t, n) {
        e.exports = n.p + "img/upc.7990a57f.svg"
    }, b93c: function (e, t, n) {
        e.exports = n.p + "img/house-fill.4a4c7452.svg"
    }, bf1d: function (e, t, n) {
        e.exports = n.p + "img/Schriftzug.b068add8.svg"
    }, d99e: function (e, t, n) {
        e.exports = n.p + "img/plus-circle.a8e8a36d.svg"
    }, f571: function (e, t, n) {
        e.exports = n.p + "img/gear.70e330eb.svg"
    }
});
//# sourceMappingURL=app.a3b19cdf.js.map