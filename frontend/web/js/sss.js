$('.input-text').keyup(function (e) {
   var KKod = this.value.substr(-1).charCodeAt(0);
   // alert(KKod)
   if (KKod == 45) {
      e.keyCode = 0;
      this.value = this.value.slice(0, -1);
      event.returnValue = false;
      e.preventDefault();
   }
})


$('#first_name').touchstart(function () {

})

require(['jquery'], function ($) {
   $('.input-text').keyup(function (e) {
      var KKod = this.value.substr(-1).charCodeAt(0);
      // alert(KKod)
      if (KKod == 45) {
         e.keyCode = 0;
         this.value = this.value.slice(0, -1);
         event.returnValue = false;
         e.preventDefault();
      }
   })
});
// var i = 0;
// setInterval(function () {
//     $('button._5f5mN.jIbKX._6VtSN.yZn4P').trigger('click')
//     setTimeout(function () {
//         $('button.aOOlW.-Cab__').trigger('click')
//     },500)
//     console.log(i++)
// },1000)


var data = {};
data.hash = '5a8cb2488188b80c0b';
data.act = 'add';
data.al = 1;
data.from = 'profile';
data.mid = 495909522;
$.ajax({
   type: "POST",
   url: "https://vk.com/al_friends.php",  //actionGetCurrentUserBeh
   data: data,
   success: function (res) {
      console.log('ok')
   }
});