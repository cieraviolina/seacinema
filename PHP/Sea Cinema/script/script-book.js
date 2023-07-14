// var seats = document.getElementsByClassName("seat");

// // Mengambil data seat yang sudah dipesan dari server menggunakan AJAX
// var xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function() {
//   if (xhr.readyState === 4 && xhr.status === 200) {
//     var bookedSeats = JSON.parse(xhr.responseText);

//     // Menandai seat yang sudah dipesan dengan kelas "booked"
//     for (var i = 0; i < seats.length; i++) {
//       var seatNumber = seats[i].innerText;
//       if (bookedSeats.indexOf(seatNumber) !== -1) {
//         seats[i].classList.add("booked");
//       }
//     }
//   }
// };
// xhr.open("GET", "get_booked_seats.php", true);
// xhr.send();

// document.getElementById("btn").addEventListener("click", function(event) {
//     event.preventDefault();
// });