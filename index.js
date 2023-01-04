function generatPDF(){
const element=document.getElementById("print");
html2pdf()
.from(element)
.save();


}