/*global angular*/
angular.module("Accounts").directive('spinnerLoader', function() {
    'use strict';

    return {
        restrict: 'EA',
        scope: {
            slVisible: '=',
            slSize: '='
        },
        template:
            '<div class="spinnerLoad">' +
                '<div id="stepOne"    class="bar"></div>' +
                '<div id="stepTwo"    class="bar"></div>' +
                '<div id="stepThree"  class="bar"></div>' +
                '<div id="stepFour"   class="bar"></div>' +
                '<div id="stepFive"   class="bar"></div>' +
                '<div id="stepSix"    class="bar"></div>' +
                '<div id="stepSeven"  class="bar"></div>' +
                '<div id="stepEight"  class="bar"></div>' +
                '<div id="stepNine"   class="bar"></div>' +
                '<div id="stepTen"    class="bar"></div>' +
                '<div id="stepEleven" class="bar"></div>' +
                '<div id="stepTvelve" class="bar"></div>' +
            '</div>',
        link: function (scope, element, attrs) {
          
          var parent = element[0].parentNode;
            
            /* Will handle visibility changes */
            scope.$watch(attrs.slVisible, function () {
              
                //element[0].style.position    = 'fixed';
                element[0].style.marginTop  = (parent.offsetHeight / 4.5) + 'px';
                element[0].style.marginLeft = (parent.offsetWidth / 2.3) + 'px';

                element.css('display', scope.slVisible ? 'block' : 'none');
            });

            /* Will handle the Size */
            scope.$watch(attrs.slSize, function () {
                if (attrs.slSize) {
                    element[0].className = attrs.slSize.toLowerCase() + 'Size';
                }
            });

        }
    };
});