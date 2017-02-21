document.addEventListener('DOMContentLoaded', (function() {
  if (__('options')) {
    var options = __('options'),
        nodes = options.children,
        add_node = options.lastElementChild,
        panel = __cn(document, "panel panel-default")[0];

    var render_options = function() {

    }();

    // add_node is the instance variable for the last <li> child of the <ul> HTML Object
    add_node.addEventListener('click', (function(event) {
      if ( __cn(document, "umd_form").length ) {
        // the condition is cero (false) if umd_form not exists and one (true) if it exists
        console.log("add options form already exists");
        console.log("removing form");
        this.firstElementChild.innerHTML = '<i class="glyphicon glyphicon-plus"></i> Add Option';
        panel.removeChild(panel.firstElementChild);
        for (var i = 0; i < panel.children.length; i++) {
          panel.children[i].style.display = "";
        }
        return;
      }
      console.log("preparing to add options");
      var container, wrap, form, div, label, inputs, script;
      this.firstElementChild.innerHTML = '<i class="glyphicon glyphicon-remove"></i> Cancel';
      inputs = new Array("Name", "icon", "href", "onclick");
      form = document.createElement('form');
        form.setAttribute("name", "umd_form");
        form.setAttribute("id", "umd_form");
        form.setAttribute("class", "umd_form");
        form.setAttribute("method", "POST");
        form.setAttribute("action", "");

      for (var i = 0; i < inputs.length; i++) {
        // preparing children to append
        div = document.createElement('div');
          div.setAttribute("class", "umd_input-group");
        input = document.createElement('input');
          input.setAttribute("type", "text");
          input.setAttribute("name", inputs[i]);
        label = document.createElement('label');
          label.innerHTML = inputs[i];
          label.setAttribute("for", inputs[i]);
          label.setAttribute("class", "umd_label");

        // append generated children
        div.appendChild(input);
        div.appendChild(label);
        form.appendChild(div);
      }

      // preparing children to append
      script = document.createElement('script');
        script.setAttribute("src", "views/app/js/umd_form.js");
      container = document.createElement('div');
        container.setAttribute("class", "umd_form_container");
      wrap = document.createElement('div');
        wrap.className = "wrap";
        wrap.style.width = "100%";
      input = document.createElement('input');
        input.setAttribute("type", "submit");
        input.setAttribute("id", "btn-submit");
        input.setAttribute("value", "Add Option");

      // append generated children
      form.appendChild(input);
      wrap.appendChild(form);
      container.appendChild(wrap);
      container.appendChild(script);
      panel.insertBefore(container, panel.firstElementChild);

      for (var i = 1; i < panel.children.length; i++) {
        panel.children[i].style.display = "none";
      }
    }), false); // end of add_node.onclick function
  }
}), false);
