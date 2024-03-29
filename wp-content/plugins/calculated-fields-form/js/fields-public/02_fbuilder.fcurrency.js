	$.fbuilder.controls[ 'fcurrency' ] = function(){};
	$.extend(
		$.fbuilder.controls[ 'fcurrency' ].prototype,
		$.fbuilder.controls[ 'ffields' ].prototype,
		{
			title:"Currency",
			ftype:"fcurrency",
			predefined:"",
			predefinedClick:false,
			required:false,
			size:"small",
			readonly:false,
			currencyText:"USD",
			thousandSeparator:",",
			centSeparator:".",
			min:"",
			max:"",
			formatDynamically:false,

			getFormattedValue:function( value )
				{
					this.centSeparator = $.trim(this.centSeparator);
					if( /^\s*$/.test( this.centSeparator ) ) this.centSeparator = '.';

					var v = $.trim( value ), parts = [], counter = 0, str = '', s = '';
					v = v.replace( new RegExp( $.fbuilder[ 'escape_symbol' ](this.currencySymbol), 'g' ), '' )
						 .replace( new RegExp( $.fbuilder[ 'escape_symbol' ](this.currencyText), 'g' ), '' );
					v = $.fbuilder.parseVal( v, this.thousandSeparator, this.centSeparator );
					if( !isNaN( v ) )
					{
						if(v < 0) s = '-';
						v = ABS(v);
						parts = v.toString().split(".");

						if( !/^\s*$/.test( this.thousandSeparator ) )
						{
							for( var i = parts[0].length-1; i >= 0; i--){
								counter++;
								str = parts[0][i] + str;
								if( counter%3 == 0 && i != 0 ) str = this.thousandSeparator + str;

							}
							parts[0] = str;
						}
						if( typeof parts[ 1 ] != 'undefined' )
						{
							if(parts[ 1 ].length == 1) parts[ 1 ] += '0';
						}
						else parts[ 1 ] = '00';

						return this.currencySymbol+s+parts.join( this.centSeparator )+this.currencyText;
					}
					else
					{
						return value;
					}
				},
			show:function()
				{
					return '<div class="fields '+this.csslayout+' cff-currency-field" id="field'+this.form_identifier+'-'+this.index+'"><label for="'+this.name+'">'+this.title+''+((this.required)?"<span class='r'>*</span>":"")+'</label><div class="dfield"><input '+(( this.readonly )? 'READONLY' : '' )+' id="'+this.name+'" name="'+this.name+'" class="field '+this.dformat+' '+this.size+((this.required)?" required":"")+'" type="text" value="'+$.fbuilder.htmlEncode( this.getFormattedValue( this.predefined ) )+'" '+( ( !/^\s*$/.test( this.min) ) ? 'min="'+$.fbuilder.parseVal( this.min, this.thousandSeparator, this.centSeparator )+'" ' : '' )+( ( !/^\s*$/.test( this.max) ) ? ' max="'+$.fbuilder.parseVal( this.max, this.thousandSeparator, this.centSeparator )+'" ' : '' )+' /><span class="uh">'+this.userhelp+'</span></div><div class="clearer"></div></div>';
				},
			after_show:function()
				{
					if( this.formatDynamically )
					{

						var me = this;
						$( document ).on( 'change', '[name="' + me.name + '"]', function(){
							this.value = me.getFormattedValue( this.value );
						} );
					}

					if( typeof $[ 'validator' ] != 'undefined' )
					{
						$.validator.addMethod( 'min', function( value, element, param )
                                        {
                                            var e = element;
                                            if( element.id.match( /_\d+$/) )
                                            {
                                                e = $.fbuilder[ 'forms' ][ element.id.match( /_\d+$/)[ 0 ] ].getItem( element.name )
                                            }
											else if(
												typeof $.fbuilder[ 'forms' ] != 'undefined' &&
												typeof $.fbuilder[ 'forms' ][ '' ] != 'undefined'
											)
											{
												e = $.fbuilder[ 'forms' ][ '' ].getItem( element.name )
											}

                                            var thousandSeparator = ( typeof e.thousandSeparator != 'undefined' ) ? e.thousandSeparator : '',
                                                centSymbol = ( typeof e.centSeparator != 'undefined' && $.trim( e.centSeparator ) ) ? e.centSeparator : '.';

                                            return this.optional(element) || $.fbuilder.parseVal( value, thousandSeparator, centSymbol ) >= param;
                                        }
						);

						$.validator.addMethod( 'max', function( value, element, param )
                                        {
                                            var e = element;
                                            if( element.id.match( /_\d+$/) )
                                            {
                                                e = $.fbuilder[ 'forms' ][ element.id.match( /_\d+$/)[ 0 ] ].getItem( element.name )
                                            }
                                            else if(
												typeof $.fbuilder[ 'forms' ] != 'undefined' &&
												typeof $.fbuilder[ 'forms' ][ '' ] != 'undefined'
											)
											{
												e = $.fbuilder[ 'forms' ][ '' ].getItem( element.name )
											}


                                            var thousandSeparator = ( typeof e.thousandSeparator != 'undefined' ) ? e.thousandSeparator : '',
                                                centSymbol = ( typeof e.centSeparator != 'undefined' && $.trim( e.centSeparator ) ) ? e.centSeparator : '.';

                                            return this.optional(element) || $.fbuilder.parseVal( value, thousandSeparator, centSymbol ) <= param;
                                        }
						);

					}
				},
			val:function()
				{
					var e = $( '[id="' + this.name + '"]:not(.ignore)' );
					if( e.length )
					{
						var v = $.trim( e.val() );

						v = v.replace( new RegExp( $.fbuilder[ 'escape_symbol' ](this.currencySymbol), 'g' ), '' )
						     .replace( new RegExp( $.fbuilder[ 'escape_symbol' ](this.currencyText), 'g' ), '' );

						return $.fbuilder.parseVal( v, this.thousandSeparator, this.centSeparator );
					}
					return 0;
				}
		}
	);