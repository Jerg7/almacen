// FRAME FOR INPUTS
const FRAME = function (){
    this.id = str => document.getElementById(str);
    this.query = (selector, one = false) => one === true ? document.querySelector(selector) : document.querySelectorAll(selector);
    this.create = (str, props = {}) => Object.assign(document.createElement(str), props);
    this.append = (hijos, padre = document.body) => {
        hijos.length ? hijos.map(hijo => padre.appendChild(hijo)) : padre.appendChild(hijos);
    }
    this.remove = e => e.remove();
}
const F = new FRAME();