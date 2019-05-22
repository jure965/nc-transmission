(function() {
  var template = Handlebars.template, templates = Handlebars.templates = Handlebars.templates || {};
templates['table'] = template({"1":function(container,depth0,helpers,partials,data) {
    var helper, alias1=depth0 != null ? depth0 : (container.nullContext || {}), alias2=helpers.helperMissing, alias3=container.escapeExpression, alias4="function";

  return "        <tr>\n            <td>"
    + alias3((helpers.dateToStr || (depth0 && depth0.dateToStr) || alias2).call(alias1,(depth0 != null ? depth0.addedDate : depth0),{"name":"dateToStr","hash":{},"data":data}))
    + "</td>\n            <td>"
    + alias3(((helper = (helper = helpers.name || (depth0 != null ? depth0.name : depth0)) != null ? helper : alias2),(typeof helper === alias4 ? helper.call(alias1,{"name":"name","hash":{},"data":data}) : helper)))
    + "</td>\n            <td>"
    + alias3(((helper = (helper = helpers.percentDone || (depth0 != null ? depth0.percentDone : depth0)) != null ? helper : alias2),(typeof helper === alias4 ? helper.call(alias1,{"name":"percentDone","hash":{},"data":data}) : helper)))
    + "</td>\n            <td>"
    + alias3(((helper = (helper = helpers.status || (depth0 != null ? depth0.status : depth0)) != null ? helper : alias2),(typeof helper === alias4 ? helper.call(alias1,{"name":"status","hash":{},"data":data}) : helper)))
    + "</td>\n        </tr>\n";
},"compiler":[7,">= 4.0.0"],"main":function(container,depth0,helpers,partials,data) {
    var stack1;

  return "<table class=\"transmissionremote-table\">\n    <thead>\n    <tr>\n        <th>addedDate</th>\n        <th>name</th>\n        <th>percentDone</th>\n        <th>status</th>\n    </tr>\n    </thead>\n    <tbody>\n"
    + ((stack1 = helpers.each.call(depth0 != null ? depth0 : (container.nullContext || {}),(depth0 != null ? depth0.torrents : depth0),{"name":"each","hash":{},"fn":container.program(1, data, 0),"inverse":container.noop,"data":data})) != null ? stack1 : "")
    + "    </tbody>\n</table>\n";
},"useData":true});
})();