	$.fbuilder.typeList.push(
		{
			id:"fdate",
			name:"Date Time",
			control_category:1
		}
	);
	$.fbuilder.controls[ 'fdate' ] = function(){};
	$.extend(
		$.fbuilder.controls[ 'fdate' ].prototype,
		$.fbuilder.controls[ 'ffields' ].prototype,
		{
			title:"Date",
			ftype:"fdate",
			predefined:"",
			predefinedClick:false,
			size:"medium",
			required:false,
			dformat:"mm/dd/yyyy",
			tformat:"24",
			showDropdown:false,
			dropdownRange:"-10:+10",
			
			minDate:"",
			maxDate:"",
            invalidDates:"",
			minHour:0,
			maxHour:23,
			minMinute:0,
			maxMinute:59,
			
			stepHour: 1,
			stepMinute: 1,
			
			showDatepicker: true,
			showTimepicker: false,
				
			defaultDate:"",
			defaultTime:"",
			working_dates:[true,true,true,true,true,true,true],
			
			formats:new Array("mm/dd/yyyy","dd/mm/yyyy"),
			
			display:function()
				{
					return '<div class="fields '+this.name+'" id="field'+this.form_identifier+'-'+this.index+'" title="'+this.name+'"><div class="arrow ui-icon ui-icon-play "></div><div title="Delete" class="remove ui-icon ui-icon-trash "></div><div title="Duplicate" class="copy ui-icon ui-icon-copy "></div><label>'+this.title+''+((this.required)?"*":"")+' ('+this.dformat+')</label><div class="dfield"><input class="field disabled '+this.size+'" type="text" value="'+$.fbuilder.htmlEncode(this.predefined)+'"/><span class="uh">'+this.userhelp+'</span></div><div class="clearer"></div></div>';
				},
			editItemEvents:function()
				{
					var evt = [
							{s:"#sDropdownRange",e:"keyup", l:"dropdownRange"},
							{s:"#sSize",e:"change", l:"size"},
							{s:"#sFormat",e:"change", l:"dformat"},
							{s:"[name='sTimeFormat']",e:"change", l:"tformat"},
							{s:"#sMinDate",e:"change keyup", l:"minDate"},
							{s:"#sMaxDate",e:"change keyup", l:"maxDate"},
							{s:"#sInvalidDates",e:"change keyup", l:"invalidDates"},
							{s:"#sDefaultDate",e:"change keyup", l:"defaultDate"},
							{s:"#sShowDropdown",e:"click", l:"showDropdown", f:function(el){
								var v = el.is(':checked'); 
								$("#divdropdownRange")[( v ) ? 'show' : 'hide']();
								return v;
								}
							},
							{s:"#sShowTimepicker",e:"click", l:"showTimepicker", f:function(el){
								var v = el.is(':checked'); 
								$(".time-options")[( v ) ? 'show' : 'hide']();
								return v;
								}
							},
							{s:"#sShowDatepicker",e:"click", l:"showDatepicker", f:function(el){return el.is(':checked');}},
							{s:"#sMinHour",e:"change keyup", l:"minHour"},
							{s:"#sMaxHour",e:"change keyup", l:"maxHour"},
							{s:"#sMinMinute",e:"change keyup", l:"minMinute"},
							{s:"#sMaxMinute",e:"change keyup", l:"maxMinute"},
							{s:"#sStepHour",e:"change keyup", l:"stepHour"},
							{s:"#sStepMinute",e:"change keyup", l:"stepMinute"},
							{s:"#sDefaultTime",e:"change keyup", l:"defaultTime"}
						];
					$(".working_dates input").bind("click", {obj: this}, function(e) {
						e.data.obj.working_dates[$(this).val()] = $(this).is(':checked');
						$.fbuilder.reloadItems({'field':e.data.obj});
					});	
					$.fbuilder.controls[ 'ffields' ].prototype.editItemEvents.call(this, evt);
				},
			showFormatIntance: function() 
				{
					var str = "";
					for (var i=0;i<this.formats.length;i++)
					{
						str += '<option value="'+this.formats[i]+'" '+((this.formats[i]==this.dformat)?"selected":"")+'>'+this.formats[i]+'</option>';
					}	
					return '<hr></hr><div><input type="checkbox" name="sShowDatepicker" id="sShowDatepicker" '+( ( this.showDatepicker ) ? 'CHECKED' : '' )+' > <label>Show input field for the date</label></div><div><label>Date Format</label><br /><select name="sFormat" id="sFormat">'+str+'</select></div>';
				},
			showSpecialDataInstance: function() 
				{
					var str = "";
					str += '<div><label>Default date [<a class="helpfbuilder" text="You can put one of the following type of values into this field:\n\nEmpty: Leave empty for current date.\n\nDate: A Fixed date with the same date format indicated in the &quot;Date Format&quot; drop-down field.\n\nNumber: A number of days from today. For example 2 represents two days from today and -1 represents yesterday.\n\nString: A smart text indicating a relative date. Relative dates must contain value (number) and period pairs; valid periods are &quot;y&quot; for years, &quot;m&quot; for months, &quot;w&quot; for weeks, and &quot;d&quot; for days. For example, &quot;+1m +7d&quot; represents one month and seven days from today.">help?</a>]</label><br /><input class="large" name="sDefaultDate" id="sDefaultDate" value="'+$.fbuilder.htmlEncode(this.defaultDate)+'" /></div>';
					str += '<div><label>Min date [<a class="helpfbuilder" text="You can put one of the following type of values into this field:\n\nEmpty: No min Date.\n\nDate: A Fixed date with the same date format indicated in the &quot;Date Format&quot; drop-down field.\n\nNumber: A number of days from today. For example 2 represents two days from today and -1 represents yesterday.\n\nString: A smart text indicating a relative date. Relative dates must contain value (number) and period pairs; valid periods are &quot;y&quot; for years, &quot;m&quot; for months, &quot;w&quot; for weeks, and &quot;d&quot; for days. For example, &quot;+1m +7d&quot; represents one month and seven days from today.">help?</a>]</label><br /><input class="large" name="sMinDate" id="sMinDate" value="'+$.fbuilder.htmlEncode(this.minDate)+'" /></div>';
					str += '<div><label>Max date [<a class="helpfbuilder" text="You can put one of the following type of values into this field:\n\nEmpty: No max Date.\n\nDate: A Fixed date with the same date format indicated in the &quot;Date Format&quot; drop-down field.\n\nNumber: A number of days from today. For example 2 represents two days from today and -1 represents yesterday.\n\nString: A smart text indicating a relative date. Relative dates must contain value (number) and period pairs; valid periods are &quot;y&quot; for years, &quot;m&quot; for months, &quot;w&quot; for weeks, and &quot;d&quot; for days. For example, &quot;+1m +7d&quot; represents one month and seven days from today.">help?</a>]</label><br /><input class="large" name="sMaxDate" id="sMaxDate" value="'+$.fbuilder.htmlEncode(this.maxDate)+'" /></div>';
                    str += '<div><label>Invalid Dates [<a class="helpfbuilder" text="To define some dates as invalid, enter the dates with the format: mm/dd/yyyy separated by comma; for example: 12/31/2014,02/20/2014 or by hyphen for intervals; for example: 12/20/2014-12/28/2014 ">help?</a>]</label><br /><input class="large" name="sInvalidDates" id="sInvalidDates" value="'+$.fbuilder.htmlEncode(this.invalidDates)+'" /></div>';
                    str += '<div><input type="checkbox" name="sShowDropdown" id="sShowDropdown" '+((this.showDropdown)?"checked":"")+'/><label>Show Dropdown Year and Month</label><div id="divdropdownRange" style="display:'+((this.showDropdown)?"":"none")+'">Year Range [<a class="helpfbuilder" text="The range of years displayed in the year drop-down: either relative to today\'s year (&quot;-nn:+nn&quot;), absolute (&quot;nnnn:nnnn&quot;), or combinations of these formats (&quot;nnnn:-nn&quot;)">help?</a>]: <input type="text" name="sDropdownRange" id="sDropdownRange" value="'+$.fbuilder.htmlEncode(this.dropdownRange)+'"/></div></div>';
					str += '<div class="working_dates"><label>Selectable dates </label><br /><input name="sWD0" id="sWD0" value="0" type="checkbox" '+((this.working_dates[0])?"checked":"")+'/>Su<input name="sWD1" id="sWD1" value="1" type="checkbox" '+((this.working_dates[1])?"checked":"")+'/>Mo<input name="sWD2" id="sWD2" value="2" type="checkbox" '+((this.working_dates[2])?"checked":"")+'/>Tu<input name="sWD3" id="sWD3" value="3" type="checkbox" '+((this.working_dates[3])?"checked":"")+'/>We<input name="sWD4" id="sWD4" value="4" type="checkbox" '+((this.working_dates[4])?"checked":"")+'/>Th<input name="sWD5" id="sWD5" value="5" type="checkbox" '+((this.working_dates[5])?"checked":"")+'/>Fr<input name="sWD6" id="sWD6" value="6" type="checkbox" '+((this.working_dates[6])?"checked":"")+'/>Sa</div>';
					
					// Fields for timepicker
					str += '<hr></hr>'
					str += '<div><input type="checkbox" name="sShowTimepicker" id="sShowTimepicker" '+( ( this.showTimepicker ) ? 'CHECKED' : '' )+' > <label>Include time</label></div>';
					str += '<div class="time-options" '+( ( !this.showTimepicker ) ? 'style="display:none;"': '' )+'>';
					str += '<div><label>Time Format</label><br /><label><input type="radio" name="sTimeFormat" id="sTimeFormat" value="24" '+( ( this.tformat == 24 ) ? 'CHECKED' : '' )+' /> 24 hours</label> <label><input type="radio" name="sTimeFormat" id="sTimeFormat" value="12" '+( ( this.tformat == 12 ) ? 'CHECKED' : '' )+' /> 12 hours</label></div>';
					str += '<div><label>Default Time HH:mm</label><br /><input class="large" name="sDefaultTime" id="sDefaultTime" value="'+$.fbuilder.htmlEncode(this.defaultTime)+'" /></div>';
					str += '<div><label>Min Hour</label><br /><input class="large" name="sMinHour" id="sMinHour" value="'+$.fbuilder.htmlEncode(this.minHour)+'" /></div>';
					str += '<div><label>Max Hour</label><br /><input class="large" name="sMaxHour" id="sMaxHour" value="'+$.fbuilder.htmlEncode(this.maxHour)+'" /></div>';
					str += '<div><label>Min Minutes</label><br /><input class="large" name="sMinMinute" id="sMinMinute" value="'+$.fbuilder.htmlEncode(this.minMinute)+'" /></div>';
					str += '<div><label>Max Minutes</label><br /><input class="large" name="sMaxMinute" id="sMaxMinute" value="'+$.fbuilder.htmlEncode(this.maxMinute)+'" /></div>';
					
					str += '<div><label>Steps for hours</label><br /><input class="large" name="sStepHour" id="sStepHour" value="'+$.fbuilder.htmlEncode(this.stepHour)+'" /></div>';
					str += '<div><label>Steps for minutes</label><br /><input class="large" name="sStepMinute" id="sStepMinute" value="'+$.fbuilder.htmlEncode(this.stepMinute)+'" /></div>';
					str += '</div>';
					str += '<hr></hr>';
					return str;
				}
	});