(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-25ffaaa9"],{2708:function(e,t,a){"use strict";var n=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"form-group"},[a("div",{staticClass:"input-group"},[e.label?a("label",[e._v(e._s(e.label))]):e._e(),e.$slots.prepend?a("div",{staticClass:"input-group-prepend"},[a("span",{staticClass:"input-group-text"},[e._t("prepend")],2)]):e._e(),e._t("default"),e.$slots.append?a("div",{staticClass:"input-group-append"},[a("span",{staticClass:"input-group-text"},[e._t("append")],2)]):e._e()],2),a("small",{staticClass:"form-text text-muted text-left"},[e._v(e._s(e.description))])])},s=[],i={name:"FpInput",props:["description","label"]},o=i,r=a("2877"),p=Object(r["a"])(o,n,s,!1,null,"41129320",null);t["a"]=p.exports},"6bfd":function(e,t,a){},"855b":function(e,t,a){"use strict";a.r(t);var n=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("form",[a("fp-input",{attrs:{label:"Logo",description:"Laden Sie hier ihr eigenes Logo hoch. Alternativ wird einfach ihr Firmenname Angezeigt."}},[a("i",{staticClass:"fas fa-image",attrs:{slot:"prepend"},slot:"prepend"}),a("input",{attrs:{type:"file",accept:"image/*"},on:{change:e.onFileChange}})]),a("fp-input",{attrs:{description:"Ihr Firmenname ist dafür da, ihr Unternehmen zu finden, wir empfehlen nicht diesen zu ändern, außer es ist absolut nötig."}},[a("i",{staticClass:"fas fa-user",attrs:{slot:"prepend"},slot:"prepend"}),a("input",{directives:[{name:"model",rawName:"v-model",value:e.companyName,expression:"companyName"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Firmenname"},domProps:{value:e.companyName},on:{input:function(t){t.target.composing||(e.companyName=t.target.value)}}})]),a("fp-input",{attrs:{description:"Ihre Kontakt-Email ist für alle Kunden sichtbar"}},[a("i",{staticClass:"fas fa-at",attrs:{slot:"prepend"},slot:"prepend"}),a("input",{directives:[{name:"model",rawName:"v-model",value:e.email,expression:"email"}],staticClass:"form-control",attrs:{type:"email",placeholder:"Kontact Email"},domProps:{value:e.email},on:{input:function(t){t.target.composing||(e.email=t.target.value)}}})]),a("fp-input",{attrs:{description:"Dieser Wert bestimmt, wie viel € einen Punkt wert ist."}},[a("span",{attrs:{slot:"prepend"},slot:"prepend"},[e._v("1 FP")]),a("input",{directives:[{name:"model",rawName:"v-model",value:e.exchangeRate,expression:"exchangeRate"}],staticClass:"form-control",attrs:{type:"number",min:"1"},domProps:{value:e.exchangeRate},on:{input:function(t){t.target.composing||(e.exchangeRate=t.target.value)}}}),a("i",{staticClass:"fas fa-euro-sign",attrs:{slot:"append"},slot:"append"})]),a("button",{staticClass:"btn btn-primary",attrs:{type:"submit"}},[e._v("Speichern")])],1)},s=[],i=a("2708"),o=a("bc3a"),r=a.n(o),p={name:"Profile",components:{FpInput:i["a"]},data:function(){return{logo:"",companyName:"",email:"",exchangeRate:1}},created:function(){r.a.get(this.$store.state.url+"/changeFirma",{token:this.$store.state.token,companyName:""})},methods:{onFileChange:function(e){this.logo=e.target.files[0]},saveChanges:function(){r.a.post(this.$store.state.url+"/changeFirma",{token:this.$store.state.token,logo:this.logo,companyName:this.companyName,email:this.email,exchangeRate:this.exchangeRate}).then((function(e){console.debug(e)})).catch((function(e){console.error(e)}))}}},l=p,c=(a("e2f9"),a("2877")),u=Object(c["a"])(l,n,s,!1,null,"a190a462",null);t["default"]=u.exports},e2f9:function(e,t,a){"use strict";var n=a("6bfd"),s=a.n(n);s.a}}]);
//# sourceMappingURL=chunk-25ffaaa9.beed359d.js.map