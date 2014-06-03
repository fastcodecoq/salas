
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};


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