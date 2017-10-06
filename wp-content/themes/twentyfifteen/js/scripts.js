$(document).ready(function() {

  // Posición de menú abajo de los logos en home
	var alto_logos = $('.logos').outerHeight();
	$('.bloque_menu').css({'top':alto_logos}); 

  $(function() {      
    $(' .elemento a').each( function() { $(this).hoverdir(); } );
  });

  $('.elemento').hover(function() {
    $(this).find('.tipo').addClass('hover');
    $(this).find('.cliente_cat').addClass('hover');
  }, function() {
    $(this).find('.tipo').removeClass('hover');
    $(this).find('.cliente_cat').removeClass('hover');
  });

  $('.ver').hover(function() {
    $(this).find("span:nth-child(1)").addClass('centro');
  }, function() {
    $(this).find("span:nth-child(1)").removeClass('centro');
  });

   setTimeout(function(){
    var altoimg = $('.main img').outerHeight();
    $('.main a[rel="prev"], .main a[rel="next"]').css({'height':altoimg});
  }, 50);

  $('a[rel="next"], a[rel="prev"]').hover(function() {
    $(this).find('img').animate({'opacity':1},200);
    $(this).find('i').animate({'opacity':0},200);
  }, function() {
    $(this).find('img').animate({'opacity':0},200);
    $(this).find('i').animate({'opacity':1}),200;
  });

  $(window).resize(function() {
    var altoimg = $('.main img').outerHeight();
    $('.main a[rel="prev"], .main a[rel="next"]').css({'height':altoimg});
  });

});


  $(document).ready(function() {
    
    $('#animacion').addClass('mov');

    var $cir = $("#circulos").drawsvg({
            duration:1500,
            callback:circulos,
           });

    var $ed = $("#ed").drawsvg({
            duration:3000,
           });

    $cir.drawsvg('animate');
    $ed.drawsvg('animate');

    function circulos (){
      $('#circulos #uno').animate({'fill-opacity':1}, 400);     
      $('#circulos #tres').delay(200).animate({'fill-opacity':1}, 800);
      $('#circulos #dos').delay(200).animate({'fill-opacity':1}, 800);

      setTimeout(function(){
               edop();
            }, 600);
      
    }

    function edop () {
      var n = 1;
      while(n<20) {
        $('#letra'+n).delay(100+n*150).animate({'fill-opacity':1}, 1000);
        n++;
        if (n==19) {
          setTimeout(function(){
                    $('#consultoria').addClass('pos2');
                    setTimeout(function(){
                      $('#punto').addClass('pos2');
                    }, 600);
                    setTimeout(function(){
                      $('#implementacion').addClass('pos2');
                    }, 1200);
                    setTimeout(function(){
                      lineas();
                    },1500);
          }, 1600);

        };

      }     
    }

    

    function lineas(){      
      $('#circulos, #ed, #ci').addClass('sin');
    }

    $(function(){

        $("#typed").typed({
            strings: ["(investigación, análisis, ideación)"],//, "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
            //stringsElement: $('#typed-strings'),
            typeSpeed: 30,
            backDelay: 500,
            loop: false,
            contentType: 'html', // or text
            // defaults to false for infinite loop
            loopCount: false,
            callback: function(){ slogan(); },
            resetCallback: function() { newTyped(); }
        });       

        // $(".reset").click(function(){
        //     $("#typed").typed('reset');
        // });

    });


    function slogan(){

      $(function (){

        $("#typed2").typed({
            strings: ["(desarrollo, ejecución, evaluación)"],
            //stringsElement: $('#typed-strings2'),
            typeSpeed: 30,
            backDelay: 500,
            loop: false,
            contentType: 'html', // or text
            // defaults to false for infinite loop
            loopCount: false,
            callback: function(){ foo(); },
            resetCallback: function() { newTyped(); }
        });       

        // $(".reset").click(function(){
        //     $("#typed").typed('reset');
        // });

    });

    }

    $(function(){

        $("#typed3").typed({
            strings: ["Creamos soluciones centradas en los usuarios","innovamos para impulsar tu negocio"],//, "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
            //stringsElement: $('#typed-strings'),
            typeSpeed: 30,
            backDelay: 3000,
            loop: true,
            contentType: 'html', // or text
            // defaults to false for infinite loop
            loopCount: false,
        });       

        // $(".reset").click(function(){
        //     $("#typed").typed('reset');
        // });

    });
    
    

    function newTyped(){ /* A new typed object */ }

    function foo(){ console.log("Callback");}
    

  });

$(window).scroll(function(){
      // Atora el menú en el top al hacer scroll
      var mymenu = $('.bloque_menu').offset();
      var altolgs = $('.logos').outerHeight();
      
        if($(window).scrollTop() >= mymenu.top) {
              
          $('.bloque_menu').addClass('fijo');
        }
        if($(window).scrollTop() < altolgs) {
          
          $('.bloque_menu').removeClass('fijo');
        }

});