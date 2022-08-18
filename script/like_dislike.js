// $(document).ready(function () {
//     // when the user clicks on like
//     $(document).on('click', '.like',function (e) {
//         var id_loisir = $(this).data('id_loisir')
//         $loisir = $(this);
//         //alert($(e.target).attr("#data-id"))
//         $.ajax({
//             url: 'affichage.php',
//             type: 'post',
//             data: {
//                 'liked': 1,
//                 'id_loisir': id_loisir
//             },
//             success: function (response) {
//                 $loisir.parent().find('input.likes_count').text(response + " likes");
//                 $loisir.addClass('hide');
//                 $loisir.siblings().removeClass('hide');
//             }
//         });
//     });

//     // when the user clicks on unlike
//     $('.unlike').on('click', function () {
//         var id_loisir = $(this).data('id_loisir');
//         $loisir = $(this);

//         $.ajax({
//             url: 'affichage.php',
//             type: 'post',
//             data: {
//                 'unliked': 1,
//                 'id_loisir': id_loisir
//             },
//             success: function (response) {
//                 $loisir.parent().find('input.likes_count').text(response + " likes");
//                 $loisir.addClass('hide');
//                 $loisir.siblings().removeClass('hide');
//             }
//         });
//     });

//     //dislike

//     $(document).on('click', '.dislike',function (e) {
//         var id_loisir = $(this).data('id_loisir')
//         $loisir = $(this);
//         //alert($(e.target).attr("#data-id"))
//         $.ajax({
//             url: 'affichage.php',
//             type: 'post',
//             data: {
//                 'liked': 1,
//                 'id_loisir': id_loisir
//             },
//             success: function (response) {
//                 $loisir.parent().find('input.likes_count').text(response + " dislikes");
//                 $loisir.addClass('hide');
//                 $loisir.siblings().removeClass('hide');
//             }
//         });
//     });

//     // when the user clicks on unlike
//     $('.undislike').on('click', function () {
//         var id_loisir = $(this).data('id_loisir');
//         $loisir = $(this);

//         $.ajax({
//             url: 'affichage.php',
//             type: 'post',
//             data: {
//                 'unliked': 1,
//                 'id_loisir': id_loisir
//             },
//             success: function (response) {
//                 $loisir.parent().find('input.likes_count').text(response + " dislikes");
//                 $loisir.addClass('hide');
//                 $loisir.siblings().removeClass('hide');
//             }
//         });
//     });
// });

function clickMe(){
    var result ="<?php php_func(); ?>"
    document.write(result);
    }

    function chooseFile() {
        $("#fileInput").click();
        }
      