(function() {
   tinymce.create('tinymce.plugins.destacado', {
      init : function(ed, url) {
         ed.addButton('destacado', {
            title : 'Inserta texto con formato destacado',
            // image : url+'/recentpostsbutton.png',
            text: 'TEXTO DESTACADO',
            onclick : function() {
               var texto = 'Inserta tu texto aquí';
               ed.execCommand('mceInsertContent', false, '[destacado]'+texto+'[/destacado]');               
            }
         });
      },
   });
   tinymce.PluginManager.add('destacado', tinymce.plugins.destacado);
})();

(function() {
   tinymce.create('tinymce.plugins.cuadro', {
      init : function(ed, url) {
         ed.addButton('cuadro', {
            title : 'Inserta texto en cuadro azul',
            // image : url+'/recentpostsbutton.png',
            text: 'TEXTO EN CUADRO AZUL',
            onclick : function() {
               var texto = 'Inserta tu texto aquí';
               ed.execCommand('mceInsertContent', false, '[cuadro]'+texto+'[/cuadro]');               
            }
         });
      },
   });
   tinymce.PluginManager.add('cuadro', tinymce.plugins.cuadro);
})();

(function() {
   tinymce.create('tinymce.plugins.titulo', {
      init : function(ed, url) {
         ed.addButton('titulo', {
            title : 'Inserta un título',
            // image : url+'/recentpostsbutton.png',
            text: 'TÍTULO',
            onclick : function() {
               var texto = 'Inserta tu título aquí';
               ed.execCommand('mceInsertContent', false, '[titulo]'+texto+'[/titulo]');   
            }
         });
      },
   });
   tinymce.PluginManager.add('titulo', tinymce.plugins.titulo);
})();

(function() {
   tinymce.create('tinymce.plugins.tituloazul', {
      init : function(ed, url) {
         ed.addButton('tituloazul', {
            title : 'Inserta un título',
            // image : url+'/recentpostsbutton.png',
            text: 'TÍTULO AZUL',
            onclick : function() {
               var texto = 'Inserta tu título aquí';
               ed.execCommand('mceInsertContent', false, '[tituloazul]'+texto+'[/tituloazul]');   
            }
         });
      },
   });
   tinymce.PluginManager.add('tituloazul', tinymce.plugins.tituloazul);
})();



// (function() {
//    tinymce.create('tinymce.plugins.recentposts', {
//       init : function(ed, url) {
//          ed.addButton('recentposts', {
//             title : 'Recent posts',
//             image : url+'/recentpostsbutton.png',
//             text: 'POST RECIENTES',
//             onclick : function() {
//                var posts = prompt("Number of posts", "1");
//                var text = prompt("List Heading", "This is the heading text");

//                if (text != null && text != ''){
//                   if (posts != null && posts != '')
//                      ed.execCommand('mceInsertContent', false, '[recent-posts posts="'+posts+'"]'+text+'[/recent-posts]');
//                   else
//                      ed.execCommand('mceInsertContent', false, '[recent-posts]'+text+'[/recent-posts]');
//                }
//                else{
//                   if (posts != null && posts != '')
//                      ed.execCommand('mceInsertContent', false, '[recent-posts posts="'+posts+'"]');
//                   else
//                      ed.execCommand('mceInsertContent', false, '[recent-posts]');
//                }
//             }
//          });
//       },
//       createControl : function(n, cm) {
//          return null;
//       },
//       getInfo : function() {
//          return {
//             longname : "Recent Posts",
//             author : 'Konstantinos Kouratoras',
//             authorurl : 'http://www.kouratoras.gr',
//             infourl : '',
//             version : "1.0"
//          };
//       }
//    });
//    tinymce.PluginManager.add('recentposts', tinymce.plugins.recentposts);
// })();