var doc = new jsPDF();
const btnPdf = $("#btnPdf");

btnPdf.click(function () {
  saveDiv("Title");
});

function saveDiv(title) {
  doc.fromHTML(
    `<html><head><title>${title}</title></head><body>` +
      $("#pdfDiv").html() +
      `</body></html>`
  );
  doc.save("div.pdf");
}
