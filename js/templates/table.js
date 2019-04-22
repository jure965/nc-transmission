(function() {
  var template = Handlebars.template, templates = Handlebars.templates = Handlebars.templates || {};
templates['table'] = template({"1":function(container,depth0,helpers,partials,data) {
    var alias1=container.lambda, alias2=container.escapeExpression;

  return "        <tr>\r\n            <td>"
    + alias2(alias1((depth0 != null ? depth0.addedDate : depth0), depth0))
    + "</td>\r\n            <td>"
    + alias2(alias1((depth0 != null ? depth0.name : depth0), depth0))
    + "</td>\r\n            <td>"
    + alias2(alias1((depth0 != null ? depth0.percentDone : depth0), depth0))
    + "</td>\r\n            <td>"
    + alias2(alias1((depth0 != null ? depth0.status : depth0), depth0))
    + "</td>\r\n        </tr>\r\n";
},"compiler":[7,">= 4.0.0"],"main":function(container,depth0,helpers,partials,data) {
    var stack1;

  return "<table class=\"nct-table\">\r\n    <thead>\r\n    <tr>\r\n        <th>addedDate</th>\r\n        <th>name</th>\r\n        <th>percentDone</th>\r\n        <th>status</th>\r\n    </tr>\r\n    </thead>\r\n    <tbody>\r\n"
    + ((stack1 = helpers.each.call(depth0 != null ? depth0 : (container.nullContext || {}),(depth0 != null ? depth0.torrents : depth0),{"name":"each","hash":{},"fn":container.program(1, data, 0),"inverse":container.noop,"data":data})) != null ? stack1 : "")
    + "    </tbody>\r\n</table>\r\n";
},"useData":true});
})();