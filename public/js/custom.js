if ($("#modaldemo4").length === 1){
    $(window).load(function(){
        $('#modaldemo4').modal('show');
    });
    console.log("Modal trouvé");
}
else {
    console.log('Modal non trouvé');
}