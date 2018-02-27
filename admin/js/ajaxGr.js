$(document).ready(function() {

    // Delete
    $('.remove').click(function() {
        var el = this;
        var id = this.id;
        var splitid = id.split("_");
        // Delete id
        var deleteid = splitid[1];

        // AJAX Request
        $.ajax({
            url: '../config/remove-gr.php',
            type: 'POST',
            data: { id: deleteid },
            success: function(response) {
                console.log(response);
                // Removing row from HTML Table
                $(el).closest('tr').css('background', 'tomato');
                $(el).closest('tr').fadeOut(800, function() {
                    $(this).remove();
                });

            }
        });

    });

    //update
    $('.update').click(function() {
        var el = this;
        var id = this.id;
        var splitid = id.split("_");
        // Update id
        var updateid = splitid[1];

        var grCompany = this.getAttribute("data-company-name");
        var grInvoice = this.getAttribute("data-invoice-num");
        var grDate = this.getAttribute("data-date");
        var grAmount = this.getAttribute("data-amount");
        var grUserId = this.getAttribute("data-user-id");
        var grUserName = this.getAttribute("data-user-name");

        //Updated Value
        var currentGrCompany = $("#formCompany").val(grCompany);
        var currentGrIn = $("#formInvoice").val(grInvoice);
        var currentGrDate = $("#formDate").val(grDate);
        var currentGrAmount = $("#formAmount").val(grAmount);
        var currentGrUserId = $("#formUserId").val(grUserId);
        var currentGrUserName = $("#formUserName").val(grUserName);

        // Final Submit
        $('#confirm').click(function() {
            var updatedGrCompany = currentGrCompany.val();
            var updatedGrIn = currentGrIn.val();
            var updatedGrDate = currentGrDate.val();
            var updatedGrAmount = currentGrAmount.val();
            var updatedGrUserId = currentGrUserId.val();
            var updatedGrUserName = currentGrUserName.val();
            $.ajax({
                url: '../config/update-gr.php',
                type: 'POST',
                data: {
                    id: updateid,
                    grComp: updatedGrCompany,
                    grInvoice: updatedGrIn,
                    grDate: updatedGrDate,
                    grAmount: updatedGrAmount,
                    grUserId: updatedGrUserId,
                    grUserName: updatedGrUserName
                },
                success: function(response) {
                    // Removing row from HTML Table
                    console.log(response);
                    setInterval(function() { location.reload(); }, 500);
                }
            });
        });
    });


});
var company, invoice, date, amount, userId, userName, updateid;

function update(data) {
    var el = data;
    var id = data.id;
    var splitid = id.split("_");
    // Update id
    updateid = splitid[1];

    company = data.getAttribute("data-company-name");
    invoice = data.getAttribute("data-invoice-num");
    date = data.getAttribute("data-date");
    amount = data.getAttribute("data-amount");
    userId = data.getAttribute("data-user-id");
    userName = data.getAttribute("data-user-name");
    $("#formCompany").val(company);
    $("#formInvoice").val(invoice);
    $("#formDate").val(date);
    $("#formAmount").val(amount);
    $("#formUserId").val(userId);
    $("#formUserName").val(userName);
}

// Final Submit
$('#confirm').click(function() {
    var updatedGrCompany = $("#formCompany").val();
    var updatedGrIn = $("#formInvoice").val();
    var updatedGrDate = $("#formDate").val();
    var updatedGrAmount = $("#formAmount").val();
    var updatedGrUserId = $("#formUserId").val();
    var updatedGrUserName = $("#formUserName").val();
    $.ajax({
        url: '../config/update-gr.php',
        type: 'POST',
        data: {
            id: updateid,
            grComp: updatedGrCompany,
            grInvoice: updatedGrIn,
            grDate: updatedGrDate,
            grAmount: updatedGrAmount,
            grUserId: updatedGrUserId,
            grUserName: updatedGrUserName
        },
        success: function(response) {
            // Removing row from HTML Table
            console.log(response);
            setInterval(function() { location.reload(); }, 500);
        }
    });
});