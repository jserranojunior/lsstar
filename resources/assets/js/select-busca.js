/*
####################

SEMPRE ADICIONAR EM .addClass( "form-control ...
o nome da classe



######################
*/











/* BUSCA DINAMICA EM INPUT DO TIPO SELECT */

  /* ##############  SELECIONAR FORNECEDOR ################# */

$( function() {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
  
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
  
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
  
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "form-control form-fornecedor custom-combobox-input   ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            classes: {
              "ui-tooltip": "ui-state-highlight"
            }
          });
  
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
  
          autocompletechange: "_removeIfInvalid"
        });
      },
  
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
  
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Mostrar Todos" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .on( "mousedown", function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .on( "click", function() {
            input.trigger( "focus" );
  
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
  
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
  
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
  
      _removeIfInvalid: function( event, ui ) {
  
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
  
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
  
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
  
        // COLOCAR O VALOR NO INPUT
       // this.input.val(value);
           
          
        this.element.val( "value" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },
      
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      },   
  
    }); 
   
        $( "#favorecido" ).combobox();
            $( "#toggle" ).on( "click", function() {
              $( "#favorecido" ).toggle();     
            });        
         
          
   /*FIM BUSCA INPUT */
  
 
          $('.form-fornecedor').change(function(){           
              var value = $('.ui-autocomplete-input').val();                            
              $('#favorecido').append($('<option>', {
              value: value,
              text: value,
              selected: 'selected',
              }));
              $('.id_100 option[value=value]').attr('selected','selected');        
              });
   }); 



 /* ##############  SELECIONAR CONTA ################# */

  /* BUSCA DINAMICA EM INPUT DO TIPO SELECT */


  $( function() {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
  
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
  
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
  
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "form-control form-conta custom-combobox-input   ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            classes: {
              "ui-tooltip": "ui-state-highlight"
            }
          });
  
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
  
          autocompletechange: "_removeIfInvalid"
        });
      },
  
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
  
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Mostrar Todos" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .on( "mousedown", function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .on( "click", function() {
            input.trigger( "focus" );
  
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
  
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
  
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
  
      _removeIfInvalid: function( event, ui ) {
  
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
  
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
  
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
  
        // COLOCAR O VALOR NO INPUT
       // this.input.val(value);
           
          
        this.element.val( "value" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },
      
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      },   
  
    }); 
   
        $( "#ccustos" ).combobox();
            $( "#toggle" ).on( "click", function() {
              $( "#ccustos" ).toggle();     
            });        
  
    
          $('.form-conta').change(function(){           
              var value = $('.form-conta').val();                            
              $('#ccustos').append($('<option>', {
              value: value,
              text: value,
              selected: 'selected',
              }));
              $('.id_100 option[value=value]').attr('selected','selected');        
              });
});







 /* ##############  SELECIONAR CLIENTE ################# */

  /* BUSCA DINAMICA EM INPUT DO TIPO SELECT */


  $( function() {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
  
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
  
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
  
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "form-control form-nome custom-combobox-input   ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            classes: {
              "ui-tooltip": "ui-state-highlight"
            }
          });
  
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
  
          autocompletechange: "_removeIfInvalid"
        });
      },
  
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
  
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Mostrar Todos" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .on( "mousedown", function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .on( "click", function() {
            input.trigger( "focus" );
  
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
  
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
  
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
  
      _removeIfInvalid: function( event, ui ) {
  
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
  
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
  
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
  
        // COLOCAR O VALOR NO INPUT
       // this.input.val(value);
           
          
        this.element.val( "value" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },
      
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      },   
  
    }); 
   
        $( "#nome" ).combobox();
            $( "#toggle" ).on( "click", function() {
              $( "#nome" ).toggle();     
            });        
  
    
          $('.form-nome').change(function(){           
              var value = $('.form-nome').val();                            
              $('#nome').append($('<option>', {
              value: value,
              text: value,
              selected: 'selected',
              }));
              $('.id_100 option[value=value]').attr('selected','selected');        
              });
});

  
