// $(document).ready(function ($) {
//     // Get the current page URL
//     var currentUrl = window.location.href;
//     console.log(currentUrl);
//     // Loop through each menu item and add the 'active' class if the link matches the current page URL
//     $('li a').each(function () {
//         var menuItemUrl = $(this).attr('href');
//         //console.log(menuItemUrl);
//         // Check if the current page URL contains the menu item URL
//         if (currentUrl.indexOf(menuItemUrl) !== -1) {
//             $(this).closest('li').addClass('active__page');
//         }
//     });
//     var readmorebtn = document.getElementById('read__more__btn');
//     readmorebtn.addEventListener('click', function () {
//         document.querySelector('.more__info__block').style.display = 'block';
//         readmorebtn.style.display = 'none';
//     })
// });

$(document).ready(function() {
    // Get the id of the body
    var bodyId = $('body').attr('id');
    // Check each li element in the repeater
    $('ul li').each(function() {
        // Get the id of the current li
        var liId = $(this).attr('id');
        // Check if the body id and li id are the same
        if (bodyId === liId) {
            // Add a class to the li
            $(this).addClass('active__page');
        }
    });
});