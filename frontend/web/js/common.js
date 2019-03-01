$(document).ready(function () {
    $('#years').change(function () {
        document.location.replace('/annual/' + $(this).val());
    })
})

//
// var src = ['asdasdasd.mp4', 'safsfewfwef.mp4', 'sdfsdfsfsdf.jpg', 'sdfdsfsdfsdf.mp4'];
// src.forEach(function (value) {
//     if (value.indexOf('.mp4') >= 0) {
//         console.log('Video-', value)
//     } else {
//         console.log('Image-', value)
//     }
// })

// $('.vidooo').each(function () {
//     if ($(this).attr('name').indexOf('.mp4') >= 0) {
//         $(this).hide();
//     } else {
//         $(this).hide();
//     }
// })

