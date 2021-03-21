(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-69b220d3"],{"20e3":function(t,e,a){"use strict";var n=a("afc9"),s=a.n(n);s.a},2708:function(t,e,a){"use strict";var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"form-group"},[a("label",{staticClass:"font-weight-bold d-block text-left"},[t._v(t._s(t.label)+" "),a("div",{staticClass:"input-group mt-2"},[t.$slots.prepend?a("span",{staticClass:"input-group-prepend"},[a("span",{staticClass:"input-group-text"},[t._t("prepend")],2)]):t._e(),t._t("default",[a("input",{staticClass:"form-control"})]),t.$slots.append?a("span",{staticClass:"input-group-append"},[a("span",{staticClass:"input-group-text"},[t._t("append")],2)]):t._e()],2)]),a("small",{staticClass:"form-text text-muted text-left"},[t._v(t._s(t.description))])])},s=[],o={name:"FpInput",props:["description","label"]},r=o,i=(a("20e3"),a("2877")),l=Object(i["a"])(r,n,s,!1,null,"a9530a52",null);e["a"]=l.exports},a3e5:function(t,e,a){"use strict";var n=a("c253"),s=a.n(n);s.a},afc9:function(t,e,a){},c253:function(t,e,a){},c39e:function(t,e,a){"use strict";a.r(e);var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("div",{staticClass:"table-responsive"},[a("table",{staticClass:"table text-left table-hover"},[a("thead",{staticClass:"thead-light"},[a("tr",[a("th",[a("font-awesome-icon",{attrs:{icon:"user"}}),t._v(" Mitarbeiter ")],1),a("th",[a("font-awesome-icon",{attrs:{icon:"envelope"}}),t._v(" Email ")],1),a("th",[a("font-awesome-icon",{attrs:{icon:"scroll"}}),t._v(" Rolle ")],1),a("th")])]),a("tbody",t._l(t.staff,(function(e,n){return a("tr",{key:n},[a("td",[t._v(t._s(e.name))]),a("td",[t._v(t._s(e.email))]),a("td",[a("select",{directives:[{name:"model",rawName:"v-model",value:e.role,expression:"staffMember.role"}],staticClass:"form-control table-role",attrs:{disabled:2===e.role},on:{change:function(a){var n=Array.prototype.filter.call(a.target.options,(function(t){return t.selected})).map((function(t){var e="_value"in t?t._value:t.value;return e}));t.$set(e,"role",a.target.multiple?n:n[0])}}},[a("option",{attrs:{value:"0"}},[t._v("Member")]),a("option",{attrs:{value:"1"}},[t._v("Verwalter")]),a("option",{attrs:{value:"2"}},[t._v("Owner")])])]),2!==e.role?a("td",[a("button",{staticClass:"btn btn-danger",on:{click:function(a){return t.removestaff(e)}}},[a("font-awesome-icon",{attrs:{icon:"trash"}})],1)]):a("td")])})),0)])]),a("div",{staticClass:"row add-staff"},[a("fp-input",{staticClass:"col-md"},[a("font-awesome-icon",{attrs:{slot:"prepend",icon:"envelope"},slot:"prepend"}),a("input",{directives:[{name:"model",rawName:"v-model",value:t.newUserEmail,expression:"newUserEmail"}],staticClass:"form-control",attrs:{type:"email",placeholder:"User Email"},domProps:{value:t.newUserEmail},on:{keydown:function(e){return!e.type.indexOf("key")&&t._k(e.keyCode,"enter",13,e.key,"Enter")?null:t.addStaff(e)},input:function(e){e.target.composing||(t.newUserEmail=e.target.value)}}})],1),a("fp-input",{staticClass:"col-md",attrs:{description:"Mit den Rollen vergeben Sie den Mitarbeitern Rechte. Ein Member darf nur Rabatte\n              scannen, ein Verwalter darf Rabatte scannen, löschen und bearbeiten und der Owner darf zusätzlich das\n              Geschäft löschen."}},[a("font-awesome-icon",{attrs:{slot:"append",icon:"scroll"},slot:"append"}),a("select",{directives:[{name:"model",rawName:"v-model",value:t.newUserRole,expression:"newUserRole"}],staticClass:"form-control",on:{change:function(e){var a=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){var e="_value"in t?t._value:t.value;return e}));t.newUserRole=e.target.multiple?a:a[0]}}},[a("option",{attrs:{disabled:"",value:""}},[t._v("Rolle auswählen")]),a("option",{attrs:{value:"0"}},[t._v("Mitarbeiter")]),a("option",{attrs:{value:"1"}},[t._v("Verwalter")]),a("option",{attrs:{value:"2"}},[t._v("Owner")])])],1)],1),a("button",{staticClass:"btn btn-info",on:{click:t.addStaff}},[a("font-awesome-icon",{attrs:{icon:"user-plus"}}),t._v(" Mitarbeiter Hinzufügen ")],1)])},s=[],o=(a("c975"),a("a434"),a("2708")),r=a("bc3a"),i=a.n(r),l=a("ecee"),c=a("c074");l["c"].add(c["F"],c["l"],c["G"],c["A"],c["J"]);var u={name:"Staff",components:{FpInput:o["a"]},data:function(){return{staff:[{id:0,name:"Mario Seidl",email:"seidl.mario@outlook.at",role:2},{id:1,name:"Kristian Kraljevic",email:"kraljevic.kristian@gmail.com",role:0},{id:1,name:"Kristian Kraljevic",email:"kraljevic.kristian@hotmail.com",role:0}],newUserEmail:"",newUserRole:""}},created:function(){var t=this;i.a.get(this.$store.state.url+"/staff",{token:this.$store.state.token,companyName:this.companyName}).then((function(e){console.debug(e),t.staff=e.data.staff}))},methods:{addStaff:function(){i.a.post(this.$store.state.url+"/staff",{token:this.$store.state.token,companyName:this.companyName,email:this.newUserEmail,role:this.newUserRole}).then((function(t){console.debug(t)})).catch((function(t){console.error(t)})),this.newUserEmail=""},removestaff:function(t){var e=this;i.a.delete(this.$store.state.url+"/staff",{token:this.$store.state.token,companyName:this.companyName,id:t.id}).then((function(a){console.debug(a);var n=e.staff.indexOf(t);n>-1&&e.staff.splice(n,1)})).catch((function(t){console.error(t)}))}}},f=u,d=(a("a3e5"),a("2877")),p=Object(d["a"])(f,n,s,!1,null,"f2025adc",null);e["default"]=p.exports},c975:function(t,e,a){"use strict";var n=a("23e7"),s=a("4d64").indexOf,o=a("a640"),r=a("ae40"),i=[].indexOf,l=!!i&&1/[1].indexOf(1,-0)<0,c=o("indexOf"),u=r("indexOf",{ACCESSORS:!0,1:0});n({target:"Array",proto:!0,forced:l||!c||!u},{indexOf:function(t){return l?i.apply(this,arguments)||0:s(this,t,arguments.length>1?arguments[1]:void 0)}})}}]);
//# sourceMappingURL=chunk-69b220d3.4ae57e45.js.map