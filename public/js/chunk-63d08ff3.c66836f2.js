(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-63d08ff3"],{"1dde":function(e,t,n){var a=n("d039"),r=n("b622"),o=n("2d00"),s=r("species");e.exports=function(e){return o>=51||!a((function(){var t=[],n=t.constructor={};return n[s]=function(){return{foo:1}},1!==t[e](Boolean).foo}))}},"20e3":function(e,t,n){"use strict";var a=n("afc9"),r=n.n(a);r.a},2708:function(e,t,n){"use strict";var a=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"form-group"},[n("label",{staticClass:"font-weight-bold d-block text-left"},[e._v(e._s(e.label)+" "),n("div",{staticClass:"input-group mt-2"},[e.$slots.prepend?n("span",{staticClass:"input-group-prepend"},[n("span",{staticClass:"input-group-text"},[e._t("prepend")],2)]):e._e(),e._t("default",[n("input",{staticClass:"form-control"})]),e.$slots.append?n("span",{staticClass:"input-group-append"},[n("span",{staticClass:"input-group-text"},[e._t("append")],2)]):e._e()],2)]),n("small",{staticClass:"form-text text-muted text-left"},[e._v(e._s(e.description))])])},r=[],o={name:"FpInput",props:["description","label"]},s=o,i=(n("20e3"),n("2877")),l=Object(i["a"])(s,a,r,!1,null,"a9530a52",null);t["a"]=l.exports},"65f0":function(e,t,n){var a=n("861d"),r=n("e8b5"),o=n("b622"),s=o("species");e.exports=function(e,t){var n;return r(e)&&(n=e.constructor,"function"!=typeof n||n!==Array&&!r(n.prototype)?a(n)&&(n=n[s],null===n&&(n=void 0)):n=void 0),new(void 0===n?Array:n)(0===t?0:t)}},8418:function(e,t,n){"use strict";var a=n("c04e"),r=n("9bf2"),o=n("5c6c");e.exports=function(e,t,n){var s=a(t);s in e?r.f(e,s,o(0,n)):e[s]=n}},a3e5:function(e,t,n){"use strict";var a=n("c253"),r=n.n(a);r.a},a434:function(e,t,n){"use strict";var a=n("23e7"),r=n("23cb"),o=n("a691"),s=n("50c4"),i=n("7b0b"),l=n("65f0"),c=n("8418"),f=n("1dde"),u=n("ae40"),d=f("splice"),p=u("splice",{ACCESSORS:!0,0:0,1:2}),m=Math.max,v=Math.min,h=9007199254740991,b="Maximum allowed length exceeded";a({target:"Array",proto:!0,forced:!d||!p},{splice:function(e,t){var n,a,f,u,d,p,w=i(this),g=s(w.length),_=r(e,g),y=arguments.length;if(0===y?n=a=0:1===y?(n=0,a=g-_):(n=y-2,a=v(m(o(t),0),g-_)),g+n-a>h)throw TypeError(b);for(f=l(w,a),u=0;u<a;u++)d=_+u,d in w&&c(f,u,w[d]);if(f.length=a,n<a){for(u=_;u<g-a;u++)d=u+a,p=u+n,d in w?w[p]=w[d]:delete w[p];for(u=g;u>g-a+n;u--)delete w[u-1]}else if(n>a)for(u=g-a;u>_;u--)d=u+a-1,p=u+n-1,d in w?w[p]=w[d]:delete w[p];for(u=0;u<n;u++)w[u+_]=arguments[u+2];return w.length=g-a+n,f}})},ae40:function(e,t,n){var a=n("83ab"),r=n("d039"),o=n("5135"),s=Object.defineProperty,i={},l=function(e){throw e};e.exports=function(e,t){if(o(i,e))return i[e];t||(t={});var n=[][e],c=!!o(t,"ACCESSORS")&&t.ACCESSORS,f=o(t,0)?t[0]:l,u=o(t,1)?t[1]:void 0;return i[e]=!!n&&!r((function(){if(c&&!a)return!0;var e={length:-1};c?s(e,1,{enumerable:!0,get:l}):e[1]=1,n.call(e,f,u)}))}},afc9:function(e,t,n){},c253:function(e,t,n){},c39e:function(e,t,n){"use strict";n.r(t);var a=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("div",{staticClass:"table-responsive"},[n("table",{staticClass:"table text-left table-hover"},[n("thead",{staticClass:"thead-light"},[n("tr",[n("th",[n("font-awesome-icon",{attrs:{icon:"user"}}),e._v(" Mitarbeiter ")],1),n("th",[n("font-awesome-icon",{attrs:{icon:"envelope"}}),e._v(" Email ")],1),n("th",[n("font-awesome-icon",{attrs:{icon:"scroll"}}),e._v(" Rolle ")],1),n("th")])]),n("tbody",e._l(e.staff,(function(t,a){return n("tr",{key:a},[n("td",[e._v(e._s(t.name))]),n("td",[e._v(e._s(t.email))]),n("td",[n("select",{directives:[{name:"model",rawName:"v-model",value:t.role,expression:"staffMember.role"}],staticClass:"form-control table-role",attrs:{disabled:2===t.role},on:{change:function(n){var a=Array.prototype.filter.call(n.target.options,(function(e){return e.selected})).map((function(e){var t="_value"in e?e._value:e.value;return t}));e.$set(t,"role",n.target.multiple?a:a[0])}}},[n("option",{attrs:{value:"0"}},[e._v("Member")]),n("option",{attrs:{value:"1"}},[e._v("Verwalter")]),n("option",{attrs:{value:"2"}},[e._v("Owner")])])]),2!==t.role?n("td",[n("button",{staticClass:"btn btn-danger",on:{click:function(n){return e.removestaff(t)}}},[n("font-awesome-icon",{attrs:{icon:"trash"}})],1)]):n("td")])})),0)])]),n("div",{staticClass:"row add-staff"},[n("fp-input",{staticClass:"col-md"},[n("font-awesome-icon",{attrs:{slot:"prepend",icon:"envelope"},slot:"prepend"}),n("input",{directives:[{name:"model",rawName:"v-model",value:e.newUserEmail,expression:"newUserEmail"}],staticClass:"form-control",attrs:{type:"email",placeholder:"User Email"},domProps:{value:e.newUserEmail},on:{keydown:function(t){return!t.type.indexOf("key")&&e._k(t.keyCode,"enter",13,t.key,"Enter")?null:e.addStaff(t)},input:function(t){t.target.composing||(e.newUserEmail=t.target.value)}}})],1),n("fp-input",{staticClass:"col-md",attrs:{description:"Mit den Rollen vergeben Sie den Mitarbeitern Rechte. Ein Member darf nur Rabatte\n              scannen, ein Verwalter darf Rabatte scannen, löschen und bearbeiten und der Owner darf zusätzlich das\n              Geschäft löschen."}},[n("font-awesome-icon",{attrs:{slot:"append",icon:"scroll"},slot:"append"}),n("select",{directives:[{name:"model",rawName:"v-model",value:e.newUserRole,expression:"newUserRole"}],staticClass:"form-control",on:{change:function(t){var n=Array.prototype.filter.call(t.target.options,(function(e){return e.selected})).map((function(e){var t="_value"in e?e._value:e.value;return t}));e.newUserRole=t.target.multiple?n:n[0]}}},[n("option",{attrs:{disabled:"",value:""}},[e._v("Rolle auswählen")]),n("option",{attrs:{value:"0"}},[e._v("Mitarbeiter")]),n("option",{attrs:{value:"1"}},[e._v("Verwalter")]),n("option",{attrs:{value:"2"}},[e._v("Owner")])])],1)],1),n("button",{staticClass:"btn btn-info",on:{click:e.addStaff}},[n("font-awesome-icon",{attrs:{icon:"user-plus"}}),e._v(" Mitarbeiter Hinzufügen ")],1)])},r=[],o=(n("c975"),n("a434"),n("2708")),s=n("bc3a"),i=n.n(s),l=n("ecee"),c=n("c074");l["c"].add(c["E"],c["k"],c["F"],c["z"],c["I"]);var f={name:"Staff",components:{FpInput:o["a"]},data:function(){return{staff:[{id:0,name:"Mario Seidl",email:"seidl.mario@outlook.at",role:2},{id:1,name:"Kristian Kraljevic",email:"kraljevic.kristian@gmail.com",role:0},{id:1,name:"Kristian Kraljevic",email:"kraljevic.kristian@hotmail.com",role:0}],newUserEmail:"",newUserRole:""}},created:function(){var e=this;i.a.get(this.$store.state.url+"/staff",{token:this.$store.state.token,companyName:this.companyName}).then((function(t){console.debug(t),e.staff=t.data.staff}))},methods:{addStaff:function(){i.a.post(this.$store.state.url+"/staff",{token:this.$store.state.token,companyName:this.companyName,email:this.newUserEmail,role:this.newUserRole}).then((function(e){console.debug(e)})).catch((function(e){console.error(e)})),this.newUserEmail=""},removestaff:function(e){var t=this;i.a.delete(this.$store.state.url+"/staff",{token:this.$store.state.token,companyName:this.companyName,id:e.id}).then((function(n){console.debug(n);var a=t.staff.indexOf(e);a>-1&&t.staff.splice(a,1)})).catch((function(e){console.error(e)}))}}},u=f,d=(n("a3e5"),n("2877")),p=Object(d["a"])(u,a,r,!1,null,"f2025adc",null);t["default"]=p.exports},c975:function(e,t,n){"use strict";var a=n("23e7"),r=n("4d64").indexOf,o=n("a640"),s=n("ae40"),i=[].indexOf,l=!!i&&1/[1].indexOf(1,-0)<0,c=o("indexOf"),f=s("indexOf",{ACCESSORS:!0,1:0});a({target:"Array",proto:!0,forced:l||!c||!f},{indexOf:function(e){return l?i.apply(this,arguments)||0:r(this,e,arguments.length>1?arguments[1]:void 0)}})},e8b5:function(e,t,n){var a=n("c6b6");e.exports=Array.isArray||function(e){return"Array"==a(e)}}}]);
//# sourceMappingURL=chunk-63d08ff3.c66836f2.js.map