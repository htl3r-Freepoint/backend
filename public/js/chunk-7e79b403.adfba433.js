(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-7e79b403"],{"1dde":function(e,t,n){var a=n("d039"),r=n("b622"),o=n("2d00"),i=r("species");e.exports=function(e){return o>=51||!a((function(){var t=[],n=t.constructor={};return n[i]=function(){return{foo:1}},1!==t[e](Boolean).foo}))}},2708:function(e,t,n){"use strict";var a=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"form-group"},[n("label",{staticClass:"font-weight-bold d-block text-left"},[e._v(e._s(e.label)+" "),n("div",{staticClass:"input-group mb-2"},[e.$slots.prepend?n("span",{staticClass:"input-group-prepend input-group-text"},[e._t("prepend")],2):e._e(),e._t("default",[n("input",{staticClass:"form-control danger"})]),e.$slots.append?n("span",{staticClass:"input-group-append input-group-text"},[e._t("append")],2):e._e()],2)]),n("small",{staticClass:"form-text text-muted text-left"},[e._v(e._s(e.description))])])},r=[],o={name:"FpInput",props:["description","label"]},i=o,s=n("2877"),l=Object(s["a"])(i,a,r,!1,null,"716ad5a2",null);t["a"]=l.exports},"65f0":function(e,t,n){var a=n("861d"),r=n("e8b5"),o=n("b622"),i=o("species");e.exports=function(e,t){var n;return r(e)&&(n=e.constructor,"function"!=typeof n||n!==Array&&!r(n.prototype)?a(n)&&(n=n[i],null===n&&(n=void 0)):n=void 0),new(void 0===n?Array:n)(0===t?0:t)}},8418:function(e,t,n){"use strict";var a=n("c04e"),r=n("9bf2"),o=n("5c6c");e.exports=function(e,t,n){var i=a(t);i in e?r.f(e,i,o(0,n)):e[i]=n}},a3e5:function(e,t,n){"use strict";var a=n("c253"),r=n.n(a);r.a},a434:function(e,t,n){"use strict";var a=n("23e7"),r=n("23cb"),o=n("a691"),i=n("50c4"),s=n("7b0b"),l=n("65f0"),c=n("8418"),u=n("1dde"),f=n("ae40"),d=u("splice"),p=f("splice",{ACCESSORS:!0,0:0,1:2}),m=Math.max,v=Math.min,h=9007199254740991,b="Maximum allowed length exceeded";a({target:"Array",proto:!0,forced:!d||!p},{splice:function(e,t){var n,a,u,f,d,p,w=s(this),g=i(w.length),_=r(e,g),y=arguments.length;if(0===y?n=a=0:1===y?(n=0,a=g-_):(n=y-2,a=v(m(o(t),0),g-_)),g+n-a>h)throw TypeError(b);for(u=l(w,a),f=0;f<a;f++)d=_+f,d in w&&c(u,f,w[d]);if(u.length=a,n<a){for(f=_;f<g-a;f++)d=f+a,p=f+n,d in w?w[p]=w[d]:delete w[p];for(f=g;f>g-a+n;f--)delete w[f-1]}else if(n>a)for(f=g-a;f>_;f--)d=f+a-1,p=f+n-1,d in w?w[p]=w[d]:delete w[p];for(f=0;f<n;f++)w[f+_]=arguments[f+2];return w.length=g-a+n,u}})},ae40:function(e,t,n){var a=n("83ab"),r=n("d039"),o=n("5135"),i=Object.defineProperty,s={},l=function(e){throw e};e.exports=function(e,t){if(o(s,e))return s[e];t||(t={});var n=[][e],c=!!o(t,"ACCESSORS")&&t.ACCESSORS,u=o(t,0)?t[0]:l,f=o(t,1)?t[1]:void 0;return s[e]=!!n&&!r((function(){if(c&&!a)return!0;var e={length:-1};c?i(e,1,{enumerable:!0,get:l}):e[1]=1,n.call(e,u,f)}))}},c253:function(e,t,n){},c39e:function(e,t,n){"use strict";n.r(t);var a=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("div",{staticClass:"table-responsive"},[n("table",{staticClass:"table text-left table-hover"},[n("thead",{staticClass:"thead-light"},[n("tr",[n("th",[n("font-awesome-icon",{attrs:{icon:"user"}}),e._v(" Mitarbeiter ")],1),n("th",[n("font-awesome-icon",{attrs:{icon:"envelope"}}),e._v(" Email ")],1),n("th",[n("font-awesome-icon",{attrs:{icon:"scroll"}}),e._v(" Rolle ")],1),n("th")])]),n("tbody",e._l(e.staff,(function(t,a){return n("tr",{key:a},[n("td",[e._v(e._s(t.name))]),n("td",[e._v(e._s(t.email))]),n("td",[n("select",{directives:[{name:"model",rawName:"v-model",value:t.role,expression:"staffMember.role"}],staticClass:"form-control table-role",attrs:{disabled:2===t.role},on:{change:function(n){var a=Array.prototype.filter.call(n.target.options,(function(e){return e.selected})).map((function(e){var t="_value"in e?e._value:e.value;return t}));e.$set(t,"role",n.target.multiple?a:a[0])}}},[n("option",{attrs:{value:"0"}},[e._v("Member")]),n("option",{attrs:{value:"1"}},[e._v("Verwalter")]),n("option",{attrs:{value:"2"}},[e._v("Owner")])])]),2!==t.role?n("td",[n("button",{staticClass:"btn btn-danger",on:{click:function(n){return e.removestaff(t)}}},[n("font-awesome-icon",{attrs:{icon:"trash"}})],1)]):n("td")])})),0)])]),n("div",{staticClass:"row add-staff"},[n("fp-input",{staticClass:"col-md"},[n("font-awesome-icon",{attrs:{slot:"prepend",icon:"envelope"},slot:"prepend"}),n("input",{directives:[{name:"model",rawName:"v-model",value:e.newUserEmail,expression:"newUserEmail"}],staticClass:"form-control",attrs:{type:"email",placeholder:"User Email"},domProps:{value:e.newUserEmail},on:{keydown:function(t){return!t.type.indexOf("key")&&e._k(t.keyCode,"enter",13,t.key,"Enter")?null:e.addStaff(t)},input:function(t){t.target.composing||(e.newUserEmail=t.target.value)}}})],1),n("fp-input",{staticClass:"col-md",attrs:{description:"Mit den Rollen vergeben Sie den Mitarbeitern Rechte. Ein Member darf nur Rabatte\n              scannen, ein Verwalter darf Rabatte scannen, löschen und bearbeiten und der Owner darf zusätzlich das\n              Geschäft löschen."}},[n("font-awesome-icon",{attrs:{slot:"append",icon:"scroll"},slot:"append"}),n("select",{directives:[{name:"model",rawName:"v-model",value:e.newUserRole,expression:"newUserRole"}],staticClass:"form-control",on:{change:function(t){var n=Array.prototype.filter.call(t.target.options,(function(e){return e.selected})).map((function(e){var t="_value"in e?e._value:e.value;return t}));e.newUserRole=t.target.multiple?n:n[0]}}},[n("option",{attrs:{disabled:"",value:""}},[e._v("Rolle auswählen")]),n("option",{attrs:{value:"0"}},[e._v("Mitarbeiter")]),n("option",{attrs:{value:"1"}},[e._v("Verwalter")]),n("option",{attrs:{value:"2"}},[e._v("Owner")])])],1)],1),n("button",{staticClass:"btn btn-info",on:{click:e.addStaff}},[n("font-awesome-icon",{attrs:{icon:"user-plus"}}),e._v(" Mitarbeiter Hinzufügen ")],1)])},r=[],o=(n("c975"),n("a434"),n("2708")),i=n("bc3a"),s=n.n(i),l=n("ecee"),c=n("c074");l["c"].add(c["z"],c["h"],c["A"],c["u"],c["D"]);var u={name:"Staff",components:{FpInput:o["a"]},data:function(){return{staff:[{id:0,name:"Mario Seidl",email:"seidl.mario@outlook.at",role:2},{id:1,name:"Kristian Kraljevic",email:"kraljevic.kristian@gmail.com",role:0},{id:1,name:"Kristian Kraljevic",email:"kraljevic.kristian@hotmail.com",role:0}],newUserEmail:"",newUserRole:""}},created:function(){var e=this;s.a.get(this.$store.state.url+"/staff",{token:this.$store.state.token,companyName:this.companyName}).then((function(t){console.debug(t),e.staff=t.data.staff}))},methods:{addStaff:function(){s.a.post(this.$store.state.url+"/staff",{token:this.$store.state.token,companyName:this.companyName,email:this.newUserEmail,role:this.newUserRole}).then((function(e){console.debug(e)})).catch((function(e){console.error(e)})),this.newUserEmail=""},removestaff:function(e){var t=this;s.a.delete(this.$store.state.url+"/staff",{token:this.$store.state.token,companyName:this.companyName,id:e.id}).then((function(n){console.debug(n);var a=t.staff.indexOf(e);a>-1&&t.staff.splice(a,1)})).catch((function(e){console.error(e)}))}}},f=u,d=(n("a3e5"),n("2877")),p=Object(d["a"])(f,a,r,!1,null,"f2025adc",null);t["default"]=p.exports},c975:function(e,t,n){"use strict";var a=n("23e7"),r=n("4d64").indexOf,o=n("a640"),i=n("ae40"),s=[].indexOf,l=!!s&&1/[1].indexOf(1,-0)<0,c=o("indexOf"),u=i("indexOf",{ACCESSORS:!0,1:0});a({target:"Array",proto:!0,forced:l||!c||!u},{indexOf:function(e){return l?s.apply(this,arguments)||0:r(this,e,arguments.length>1?arguments[1]:void 0)}})},e8b5:function(e,t,n){var a=n("c6b6");e.exports=Array.isArray||function(e){return"Array"==a(e)}}}]);
//# sourceMappingURL=chunk-7e79b403.adfba433.js.map