;(function($) {

    "use strict";
$('.tf-products').each(function(){
    var     $this = $(this),
            item = $this.data("column"),
            item2 = $this.data("column2"),
            item3 = $this.data("column3");
            // row = $this.data("row"),
            // row2 = $this.data("row2"),
            // row3 = $this.data("row3"),
            // spacer = Number($this.data("spacer")),
            // prev_icon = $this.data("prev_icon"),
            // next_icon = $this.data("next_icon");

    window.console&&console.log(item);
    // var loop = false;
    // if ($this.data("loop") == 'yes') {
    //     loop = true;
    // }

    // var auto = false;
    // if ($this.data("auto") == 'yes') {
    //     auto = true;
    // } 

    // var arrow = false;
    // if ($this.data("arrow") == 'yes') {
    //     arrow = true;
    // } 

    // var bullets = false;
    // if ($this.data("bullets") == 'yes') {
    //     bullets = true;
    // }

    var swiper = new Swiper('.product-test', {
        loop:false,
        slidesPerView: 4,
        slidesPerColumn: 2,
        slidesPerColumnFill: 'row',
        observer: true,
        observeParents: true,
        spaceBetween: 15,
        navigation: {
            clickable: true,
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            576: {
                slidesPerView: 1,
                slidesPerColumn: 2,
                spaceBetween: 15,
            },
            992: {
                slidesPerView: 2,
                slidesPerColumn: 2,
                spaceBetween: 15,
            },
    
            1200: {
                slidesPerView: 4,
                slidesPerColumn: 2,
                spaceBetween: 15,
            },
        },
    });
});
});


var swiper = new Swiper('.product-test.row2.column1', {
    loop:false,
    slidesPerColumnFill: 'row',
    slidesPerColumn: 2,
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 1,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
    },
});

var swiper = new Swiper('.product-test.row2.column2', {
    loop:false,
    slidesPerColumnFill: 'row',
    slidesPerColumn: 2,
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 2,
            spaceBetween: 15,
        },
    },
});

var swiper = new Swiper('.product-test.row2.column3', {
    loop:false,
    slidesPerColumnFill: 'row',
    slidesPerColumn: 2,
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 3,
            spaceBetween: 15,
        },
    },
});

var swiper = new Swiper('.product-test.row2.column4', {
    loop:false,
    slidesPerColumn: 1,
    slidesPerColumnFill: 'row',
    slidesPerColumn: 2,
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 4,
            spaceBetween: 15,
        },
    },
});

var swiper = new Swiper('.product-test.row2.column5', {
    loop:false,
    slidesPerColumn: 1,
    slidesPerColumnFill: 'row',
    slidesPerColumn: 2,
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 5,
            spaceBetween: 15,
        },
    },
});

var swiper = new Swiper('.product-test.row2.column6', {
    loop:false,
    slidesPerColumn: 1,
    slidesPerColumnFill: 'row',
    slidesPerColumn: 2,
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 6,
            spaceBetween: 15,
        },
    },
});

var swiper = new Swiper('.product-test.row2.column7', {
    loop:false,
    slidesPerColumn: 1,
    slidesPerColumnFill: 'row',
    slidesPerColumn: 2,
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 7,
            spaceBetween: 15,
        },
    },
});

var swiper = new Swiper('.product-test.row3.column1', {
    loop:false,
    slidesPerColumn: 3,
    slidesPerColumnFill: 'row',
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 1,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
    },
});

var swiper = new Swiper('.product-test.row3.column2', {
    loop:false,
    slidesPerColumn: 3,
    slidesPerColumnFill: 'row',
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 2,
            spaceBetween: 15,
        },
    },
});

var swiper = new Swiper('.product-test.row3.column3', {
    loop:false,
    slidesPerColumn: 3,
    slidesPerColumnFill: 'row',
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 3,
            spaceBetween: 15,
        },
    },
});

var swiper = new Swiper('.product-test.row3.column4', {
    loop:false,
    slidesPerColumn: 3,
    slidesPerColumnFill: 'row',
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 4,
            spaceBetween: 15,
        },
    },
});

var swiper = new Swiper('.product-test.row3.column5', {
    loop:false,
    slidesPerColumn: 3,
    slidesPerColumnFill: 'row',
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 5,
            spaceBetween: 15,
        },
    },
});

var swiper = new Swiper('.product-test.row3.column6', {
    loop:false,
    slidesPerColumn: 3,
    slidesPerColumnFill: 'row',
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 6,
            spaceBetween: 15,
        },
    },
});

var swiper = new Swiper('.product-test.row3.column7', {
    loop:false,
    slidesPerColumn: 3,
    slidesPerColumnFill: 'row',
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 7,
            spaceBetween: 15,
        },
    },
});

var swiper = new Swiper('.product-test.row4.column1', {
    loop:false,
    slidesPerColumn: 4,
    slidesPerColumnFill: 'row',
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 1,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
    },
});

var swiper = new Swiper('.product-test.row4.column2', {
    loop:false,
    slidesPerColumn: 4,
    slidesPerColumnFill: 'row',
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 2,
            spaceBetween: 15,
        },
    },
});
var swiper = new Swiper('.product-test.row4.column3', {
    loop:false,
    slidesPerColumn: 4,
    slidesPerColumnFill: 'row',
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 3,
            spaceBetween: 15,
        },
    },
});
var swiper = new Swiper('.product-test.row4.column4', {
    loop:false,
    slidesPerColumn: 4,
    slidesPerColumnFill: 'row',
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 4,
            spaceBetween: 15,
        },
    },
});
var swiper = new Swiper('.product-test.row4.column5', {
    loop:false,
    slidesPerColumn: 4,
    slidesPerColumnFill: 'row',
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 5,
            spaceBetween: 15,
        },
    },
});
var swiper = new Swiper('.product-test.row4.column6', {
    loop:false,
    slidesPerColumn: 4,
    slidesPerColumnFill: 'row',
    observer: true,
    observeParents: true,
    spaceBetween: 15,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 6,
            spaceBetween: 15,
        },
    },
});

var swiper = new Swiper('.product-test.row4.column7', {
    loop:false,
    slidesPerColumn: 4,
    slidesPerColumnFill: 'row',
    observer: true,
    observeParents: true,
    spaceBetween: 15,
 pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        1200: {
            slidesPerView: 7,
            spaceBetween: 15,
        },
    },
});

var galleryThumbs102 = new Swiper('.gallery-thumbs', {
    spaceBetween: 18,
    slidesPerView: 3,
    direction: 'vertical',
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    observer: true,
    observeParents: true,
  });

var galleryTop102 = new Swiper('.gallery-slider', {  
    observer: true,
    observeParents: true,    
    navigation: {
    //   nextEl: '.swiper-button-next',
    //   prevEl: '.swiper-button-prev',
    },
    thumbs: {
      swiper: galleryThumbs102
    }
});


// var galleryThumbs = new Swiper('.tf-products-single .gallery-thumbs3', {
//     spaceBetween: 18,
//     slidesPerView: 3,
//     direction: 'vertical',
//     freeMode: true,
//     watchSlidesVisibility: true,
//     watchSlidesProgress: true,
//     observer: true,
//     observeParents: true,
//   });

// var galleryTop = new Swiper('.tf-products-single .gallery-slider3', {
//     observer: true,
//     observeParents: true,        
//     navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//     },
//     thumbs: {
//       swiper: galleryThumbs
//     }
// });

// var galleryThumbs100 = new Swiper('#tab-0 .gallery-thumbs3', {
//     spaceBetween: 18,
//     slidesPerView: 3,
//     direction: 'vertical',
//     freeMode: true,
//     watchSlidesVisibility: true,
//     watchSlidesProgress: true,
//     observer: true,
//     observeParents: true,
//   });

// var galleryTop100 = new Swiper('#tab-0 .gallery-slider3', {
//     observer: true,
//     observeParents: true,        
//     navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//     },
//     thumbs: {
//       swiper: galleryThumbs100
//     }
// });

// var galleryThumbs2 = new Swiper('#tab-1 .gallery-thumbs3', {
//     spaceBetween: 18,
//     slidesPerView: 3,
//     direction: 'vertical',
//     freeMode: true,
//     watchSlidesVisibility: true,
//     watchSlidesProgress: true,
//     observer: true,
//     observeParents: true,
//   });

// var galleryTop2 = new Swiper('#tab-1 .gallery-slider3', {
//     observer: true,
//     observeParents: true,        
//     navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//     },
//     thumbs: {
//       swiper: galleryThumbs2
//     }
// });

// var galleryThumbs4 = new Swiper('#tab-2 .gallery-thumbs3', {
//     spaceBetween: 18,
//     slidesPerView: 3,
//     direction: 'vertical',
//     freeMode: true,
//     watchSlidesVisibility: true,
//     watchSlidesProgress: true,
//     observer: true,
//     observeParents: true,
//   });

// var galleryTop4 = new Swiper('#tab-2 .gallery-slider3', {    
//     observer: true,
//     observeParents: true,    
//     navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//     },
//     thumbs: {
//       swiper: galleryThumbs4
//     }
// });

// var galleryThumbs12 = new Swiper('#tab-4 .gallery-thumbs3', {
//     spaceBetween: 18,
//     slidesPerView: 3,
//     direction: 'vertical',
//     freeMode: true,
//     watchSlidesVisibility: true,
//     watchSlidesProgress: true,
//     observer: true,
//     observeParents: true,
//   });

// var galleryTop12 = new Swiper('#tab-4 .gallery-slider3', {   
//     observer: true,
//     observeParents: true,     
//     navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//     },
//     thumbs: {
//       swiper: galleryThumbs4
//     }
// });

// var galleryThumbs3 = new Swiper('#tab-3 .gallery-thumbs3', {
//   spaceBetween: 18,
//   slidesPerView: 3,
//   direction: 'vertical',
//   freeMode: true,
//   watchSlidesVisibility: true,
//   watchSlidesProgress: true,
//   observer: true,
//   observeParents: true,
// });

// var galleryTop3 = new Swiper('#tab-3 .gallery-slider3', {   
//   observer: true,
//   observeParents: true,     
//   navigation: {
//     nextEl: '.swiper-button-next',
//     prevEl: '.swiper-button-prev',
//   },
//   thumbs: {
//     swiper: galleryThumbs3
//   }
// });

// var galleryThumbs5 = new Swiper('#tab-5 .gallery-thumbs3', {
//     spaceBetween: 18,
//     slidesPerView: 3,
//     direction: 'vertical',
//     freeMode: true,
//     watchSlidesVisibility: true,
//     watchSlidesProgress: true,
//     observer: true,
//     observeParents: true,
//   });

// var galleryTop5 = new Swiper('#tab-5 .gallery-slider3', {   
//     observer: true,
//     observeParents: true,     
//     navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//     },
//     thumbs: {
//       swiper: galleryThumbs5
//     }
// });

// var galleryThumbs6 = new Swiper('#tab-6 .gallery-thumbs3', {
//     spaceBetween: 18,
//     slidesPerView: 3,
//     direction: 'vertical',
//     freeMode: true,
//     watchSlidesVisibility: true,
//     watchSlidesProgress: true,
//     observer: true,
//     observeParents: true,
//   });

// var galleryTop6 = new Swiper('#tab-6 .gallery-slider3', {   
//     observer: true,
//     observeParents: true,     
//     navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//     },
//     thumbs: {
//       swiper: galleryThumbs6
//     }
// });

// var galleryThumbs7 = new Swiper('#tab-7 .gallery-thumbs3', {
//     spaceBetween: 18,
//     slidesPerView: 3,
//     direction: 'vertical',
//     freeMode: true,
//     watchSlidesVisibility: true,
//     watchSlidesProgress: true,
//     observer: true,
//     observeParents: true,
//   });

// var galleryTop7 = new Swiper('#tab-7 .gallery-slider3', {   
//     observer: true,
//     observeParents: true,     
//     navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//     },
//     thumbs: {
//       swiper: galleryThumbs7
//     }
// });

// var galleryThumbs8 = new Swiper('#tab-8 .gallery-thumbs3', {
//     spaceBetween: 18,
//     slidesPerView: 3,
//     direction: 'vertical',
//     freeMode: true,
//     watchSlidesVisibility: true,
//     watchSlidesProgress: true,
//     observer: true,
//     observeParents: true,
//   });

// var galleryTop8 = new Swiper('#tab-8 .gallery-slider3', {   
//     observer: true,
//     observeParents: true,     
//     navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//     },
//     thumbs: {
//       swiper: galleryThumbs8
//     }
// });

// var galleryThumbs9 = new Swiper('#tab-9 .gallery-thumbs3', {
//     spaceBetween: 18,
//     slidesPerView: 3,
//     direction: 'vertical',
//     freeMode: true,
//     watchSlidesVisibility: true,
//     watchSlidesProgress: true,
//     observer: true,
//     observeParents: true,
//   });

// var galleryTop9 = new Swiper('#tab-9 .gallery-slider3', {   
//     observer: true,
//     observeParents: true,     
//     navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//     },
//     thumbs: {
//       swiper: galleryThumbs9
//     }
// });

// var galleryThumbs10 = new Swiper('#tab-10 .gallery-thumbs3', {
//     spaceBetween: 18,
//     slidesPerView: 3,
//     direction: 'vertical',
//     freeMode: true,
//     watchSlidesVisibility: true,
//     watchSlidesProgress: true,
//     observer: true,
//     observeParents: true,
//   });

// var galleryTop10 = new Swiper('#tab-10 .gallery-slider3', {   
//     observer: true,
//     observeParents: true,     
//     navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//     },
//     thumbs: {
//       swiper: galleryThumbs10
//     }
// });