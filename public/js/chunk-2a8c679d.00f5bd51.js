(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2a8c679d"],{"5e32":function(e,t,r){},"94d3":function(e,t,r){"use strict";var n=r("5e32"),s=r.n(n);s.a},a1ef:function(e,t,r){"use strict";r.r(t);var n=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",[r("qrcode-stream",{staticClass:"my-5",attrs:{id:"QRScanner"},on:{decode:e.onDecode,init:e.checkCamera}}),r("transition",{attrs:{name:"fade"},on:{enter:e.enterError}},[e.error?r("div",{staticClass:"alert alert-danger"},[e._v(" "+e._s(this.error)+" ")]):e._e()]),r("transition",{attrs:{name:"fade"},on:{enter:e.enterSuccess}},[e.success?r("div",{staticClass:"alert alert-success"},[e._v(" Gutschein erfolgreich eingelöst ")]):e._e()])],1)},s=[],a=(r("4d63"),r("ac1f"),r("25f0"),r("96cf"),r("1da1")),c=r("6d12"),o=r("bc3a"),i=r.n(o),d={name:"QrCodeScannerView",components:{QrcodeStream:c["QrcodeStream"]},data:function(){return{regex:new RegExp("_?R\\d-AT\\d_(.+)_(.+)_(\\d{4}-\\d{2}-\\d{2}T\\d{2}:\\d{2}:\\d{2})_(\\d+,\\d{2})_(\\d+,\\d{2})_(\\d+,\\d{2})_(\\d+,\\d{2})_(\\d+,\\d{2})_(.+)={1,2}_(.+)=="),error:""}},methods:{onDecode:function(e){navigator.vibrate(100),this.postData(e)},postData:function(e){var t=this;this.regex.exec(e)?(console.debug(e),i.a.post(this.$store.state.url+"/addQrCode",{code:e,hash:this.$store.state.user.token}).then((function(e){t.$store.commit("setPoints",e.data),t.success=!0})).catch((function(e){console.error(e)}))):console.error("Qrcode is invalid")},checkCamera:function(e){var t=this;return Object(a["a"])(regeneratorRuntime.mark((function r(){return regeneratorRuntime.wrap((function(r){while(1)switch(r.prev=r.next){case 0:return r.prev=0,r.next=3,e;case 3:r.next=9;break;case 5:r.prev=5,r.t0=r["catch"](0),t.error=!0,console.error(r.t0);case 9:case"end":return r.stop()}}),r,null,[[0,5]])})))()},enterError:function(){var e=this;setTimeout((function(){e.error=!1}),3e3)},enterSuccess:function(){var e=this;setTimeout((function(){e.success=!1}),3e3)}}},u=d,f=(r("94d3"),r("2877")),l=Object(f["a"])(u,n,s,!1,null,"60d96cda",null);t["default"]=l.exports}}]);
//# sourceMappingURL=chunk-2a8c679d.00f5bd51.js.map