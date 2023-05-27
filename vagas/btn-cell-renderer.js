class BtnCellRenderer {
  init(params) {
    this.params = params;

    this.eGui = document.createElement('button');
    this.eGui.innerHTML = 'Click me!';

    this.btnClickedHandler = this.btnClickedHandler.bind(this);
    this.eGui.addEventListener('click', this.btnClickedHandler);
  }

  getGui() {
    return this.eGui;
  }

  btnClickedHandler(event) {
    this.params.clicked(this.params.value);
  }

  destroy() {
    this.eGui.removeEventListener('click', this.btnClickedHandler);
  }
}
export default BtnCellRenderer;