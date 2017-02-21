document.addEventListener('DOMContentLoaded', (function() {
  // verify if umd_form is defined
  if (document.umd_form) {
    var umd_form = document.umd_form,
        nodeList = umd_form.elements;

    //Functions

    var validateInputs = function() {
      for (var i = 0; i < nodeList.length; i++) {
        if (nodeList[i].type == "text" || nodeList[i].type == "email" || nodeList[i].type == "password") {
          if (nodeList[i].value == 0) {
            console.log('El campo ' + nodeList[i].name + ' debe estar lleno');
            nodeList[i].className += " umd_error";
            return false;
          } else {
            nodeList[i].className = nodeList[i].className.replace(" umd_error","");
          }
        }
      }
      return true;
    };

    var send = function(e){
      if (!validateInputs()) {
        console.log('Inputs were not validated');
        e.preventDefault();
      } else /*if (!validateRadios()) {
        console.log('Radios were not validated');
        e.preventDefault();
      } else if (!validateCheckbox()) {
        console.log('Checkboxes were not validated');
        e.preventDefault();
      } else */ {
        console.log('');
      }
    };

    //Focus & Blur Functions
    var focusInput = function() {
      this.parentElement.children[1].className = "umd_label umd_active";
      this.parentElement.children[0].className = this.parentElement.children[0].className.replace("error", "");
    };

    var blurInput = function() {
      if (this.value.length <= 0) {
        this.parentElement.children[1].className = "umd_label";
        this.parentElement.children[0].className += " umd_error";
      }
    };

    //Events
    umd_form.addEventListener("submit", send);

    for (var i = 0; i < nodeList.length; i++) {
      if (nodeList[i].type == "text" || nodeList[i].type == "email" || nodeList[i].type == "password"){
        nodeList[i].addEventListener("focus", focusInput);
        nodeList[i].addEventListener("blur", blurInput);
      }
    }

    for (var i = 0; i < nodeList.length; i++) {
      if (nodeList[i].type == "text" || nodeList[i].type == "email" || nodeList[i].type == "password"){
        if (nodeList[i].value.length > 0) {
          nodeList[i].parentElement.children[1].className = "umd_label umd_active";
          nodeList[i].parentElement.children[0].className = nodeList[i].parentElement.children[0].className.replace("error", "");
        }
      }
    }
  }
}()), false);
