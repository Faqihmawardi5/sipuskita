document.getElementById('download-btn').addEventListener('click', function () {
    html2canvas(document.getElementById('kartu-anggota'), { scale: 2 }).then(function (canvas) {
        const imgData = canvas.toDataURL('image/png');
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF('portrait', 'mm', 'a4');
        const imgProps = pdf.getImageProperties(imgData);
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

        pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
        pdf.save('Kartu_Anggota_' + document.getElementById('download-btn').dataset.userid + '.pdf');
    });
});
