

            numeral.language('es', {
              delimiters: {
              thousands: '.',
              decimal: '.'
              },
              abbreviations: {
              thousand: 'k',
              million: 'm',
              billion: 'b',
              trillion: 't'
              },
              ordinal : function (number) {
              return number === 1 ? 'er' : 'ème';
              },
              currency: {
              symbol: '$'
              }
              });
              
              numeral.language('es');



             var app = angular.module("salas", [])
             .run(function($rootScope) {
                $rootScope.dpto = {};
                $rootScope.mcpio = {};
              });

             new login(app);
             new registro(app);
             new sala(app);
             new router(app);