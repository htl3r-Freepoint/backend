(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-34e68d67"],{2708:function(e,t,a){"use strict";var s=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"form-group"},[a("label",{staticClass:"font-weight-bold d-block text-left"},[e._v(e._s(e.label)+" "),a("div",{staticClass:"input-group mb-2"},[e.$slots.prepend?a("span",{staticClass:"input-group-prepend input-group-text"},[e._t("prepend")],2):e._e(),e._t("default",[a("input",{staticClass:"form-control danger"})]),e.$slots.append?a("span",{staticClass:"input-group-append input-group-text"},[e._t("append")],2):e._e()],2)]),a("small",{staticClass:"form-text text-muted text-left"},[e._v(e._s(e.description))])])},o=[],r={name:"FpInput",props:["description","label"]},n=r,l=a("2877"),i=Object(l["a"])(n,s,o,!1,null,"716ad5a2",null);t["a"]=i.exports},"7c54":function(e,t,a){"use strict";a.r(t);var s=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",[a("form",[a("fp-input",{attrs:{label:"Username"}},[a("font-awesome-icon",{attrs:{slot:"prepend",icon:"user"},slot:"prepend"}),a("input",{directives:[{name:"model",rawName:"v-model",value:e.username,expression:"username"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Username"},domProps:{value:e.username},on:{input:function(t){t.target.composing||(e.username=t.target.value)}}})],1),a("fp-input",[a("font-awesome-icon",{attrs:{slot:"prepend",icon:"at"},slot:"prepend"}),a("input",{directives:[{name:"model",rawName:"v-model",value:e.email,expression:"email"}],staticClass:"form-control",attrs:{type:"email",placeholder:"Email"},domProps:{value:e.email},on:{input:function(t){t.target.composing||(e.email=t.target.value)}}})],1),a("fp-input",{attrs:{label:"Vorname"}},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.firstName,expression:"firstName"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Vorname"},domProps:{value:e.firstName},on:{input:function(t){t.target.composing||(e.firstName=t.target.value)}}})]),a("fp-input",{attrs:{label:"Nachname"}},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.lastName,expression:"lastName"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Nachname"},domProps:{value:e.lastName},on:{input:function(t){t.target.composing||(e.lastName=t.target.value)}}})])],1),a("form",[a("fp-input",{attrs:{title:"Altes Passwort"}},[a("font-awesome-icon",{attrs:{slot:"prepend",icon:"key"},slot:"prepend"}),a("input",{directives:[{name:"model",rawName:"v-model",value:e.oldPassword,expression:"oldPassword"}],staticClass:"form-control",attrs:{type:"password",placeholder:"Altes Passwort",autocomplete:"password"},domProps:{value:e.oldPassword},on:{input:function(t){t.target.composing||(e.oldPassword=t.target.value)}}})],1),a("fp-input",{attrs:{title:"Neues Passwort"}},[a("font-awesome-icon",{attrs:{slot:"prepend",icon:"key"},slot:"prepend"}),a("input",{directives:[{name:"model",rawName:"v-model",value:e.newPassword,expression:"newPassword"}],staticClass:"form-control",attrs:{type:"password",placeholder:"Neues Passwort",autocomplete:"password"},domProps:{value:e.newPassword},on:{input:function(t){t.target.composing||(e.newPassword=t.target.value)}}})],1)],1)])},o=[],r=a("bc3a"),n=a.n(r),l=a("2708"),i=a("ecee"),p=a("c074");i["c"].add(p["A"],p["a"],p["n"]);var m={name:"Profile",components:{FpInput:l["a"]},data:function(){return{username:"",firstName:"",lastName:"",email:"",oldPassword:"",newPassword:""}},created:function(){var e=this;n.a.get(this.$store.state.url+"/user",{token:this.$store.state.token}).then((function(t){console.debug("Response:",t.data),e.username=t.data.username,e.email=t.data.email,e.firstName=t.data.firstName,e.lastName=t.data.lastName}))},methods:{updateData:function(){n.a.post(this.$store.state.url+"/changeUser",{toke:this.$store.state.token,username:this.username,firstName:this.firstName,lastName:this.lastName,email:this.email,oldPassword:this.oldPassword,newPassword:this.newPassword})}}},d=m,u=a("2877"),c=Object(u["a"])(d,s,o,!1,null,"2a63dc0c",null);t["default"]=c.exports}}]);
//# sourceMappingURL=chunk-34e68d67.c0e1af36.js.map