/*var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

/*$('#downloadCV').click(function () {
    doc.fromHTML($('#page').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });

    doc.save('sample-file.pdf');
});
*/

function generatePDF() {
	var doc = new jsPDF('p', 'pt', 'a4');

  doc.fromHTML($('#page').html(), 20, 20, {
  	'width':500
  });

  doc.save('cv.pdf');
}
