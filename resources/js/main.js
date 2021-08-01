
// FOR DATA AOS
AOS.init();

    
// navigation  item close/open button
    var navbar = document.querySelector('.navbar');
    var navItems = document.querySelector(".nav-items");
    function closeNav(){
        navItems.style.left = "-100%";
        navbar.style.backdropFilter = "blur(1rem)";
    }
    function openNav(){
        navItems.style.left = "0";
        navbar.style.backdropFilter = "initial";
    }
// navigation  item close button ends


document.querySelector('.logo-text').style.textShadow ="0 0 0.2rem black";


// prevente listener

function preventListener(e){
    e.preventDefault();
}

// prevente listener FINISH


// Owl carousel for Donor Sections
$('#donor .owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:2
        },
        520:{
            items:3
        },
        680:{
            items:4
        },
        768:{
            items:3
        },
        1024:{
            items:4
        },
        1200:{
            items:5
        }
    }
});

// carousel for need-blood section
$('#need-blood .owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:2
        },
        520:{
            items:3
        },
        680:{
            items:3
        },
        768:{
            items:3
        },
        1025:{
            items:3
        },
        1200:{
            items:4
        }
    }
});

//for mix it up
var mixer = mixitup('.filter-mixitup');


// FOR DROPDOWN 
function populate_dropdown(){
    var district = document.getElementById("district");
    var upazila = document.getElementById("upazila");

    upazila.innerHTML='';//Its important for removing past options

    switch(district.value){
        case "Naogaon" :
            var upazilaArr = ['Atrai', 'Badalgachi', 'Dhamoirhat', 'Manda', 'Mohadevpur', 'Naogaon', 'Niamatpur', 'Patnitala','Porsha', ' Raninagar', 'Sapahar'];
            break;
        case "Sirajganj" :
            var upazilaArr = ['Sirajganj Sadar', 'Kazipur','Ullahpara','Shahjadpur','Raiganj', 'Kamarkhanda','Tarash', 'Belkuchi','Chauhali'];
            break;
        case "Pabna" :
            var upazilaArr = ['Atgharia','Bera','Bhangura','Chatmohar','Faridpur','Ishwardi','Pabna Sadar','Shathia','Sujangar'];
            break;
    }

    upazilaArr.sort();
    var upazilaLen =  upazilaArr.length;
    for(var i= 0; i<upazilaLen; i++){
        var upazilaOption = document.createElement('option');
        upazilaOption.value = upazilaArr[i];
        upazilaOption.innerHTML = upazilaArr[i];

        upazila.options.add(upazilaOption);
    };
}
