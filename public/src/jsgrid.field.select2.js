(function(jsGrid, $, undefined) {

    var NumberField = jsGrid.NumberField;

    function SelectField(config) {
        this.items = [];
        this.selectedIndex = -1;
        this.valueField = "";
        this.textField = "";

        /*if(config.valueField && config.items.length) {
            this.valueType = typeof config.items[0][config.valueField];
        }*/

        this.sorter = this.valueType;

        NumberField.call(this, config);
    }

    SelectField.prototype = new NumberField({

        align: "center",
        valueType: "text",
        //valueType: "number",

        itemTemplate: function(value) {
            //alert(value);
            var items = this.items,
                valueField = this.valueField,
                textField = this.textField,
                resultItem="",gt="";
            if(jQuery.isArray(value)){

                $.each( value, function( key, vl ) {
                    //alert(vl[textField]);
                    //alert(JSON.stringify(value));
                    //fieldValue=value['id'];
                    resultItem=resultItem+"<div class='lgroup'>"+vl[textField]+"</div>";
                });
            }else{
            if(valueField) {
                resultItem = $.grep(items, function(item, index) {
                    return item[valueField] === value;
                })[0] || {};
            }
            else {
                resultItem = items[value];
            }}
            var result = (textField ? resultItem[textField] : resultItem);
            return (result === undefined || result === null) ? resultItem : result;
        },

        filterTemplate: function() {
            if(!this.filtering)
                return "";

            var grid = this._grid,
                $result = this.filterControl = this._createSelect();

            if(this.autosearch) {
                $result.on("change", function(e) {
                    grid.search();
                });
            }

            return $result;
        },

        insertTemplate: function() {
            if(!this.inserting)
                return "";

            var $result = this.insertControl = this._createSelect();
            return $result;
        },

        editTemplate: function(value) {
            if(!this.editing)
                return this.itemTemplate(value);
            var amount  = new Array();
            if(jQuery.isArray(value))
            {
                $.each( value, function( key, val ) {
                    amount.push(val["id"]);
                });
            }else{
                amount.push(value);
            }
            var $result= this.editControl = this._createSelect(amount);
            return $result;
        },

        filterValue: function() {
            var val = this.filterControl.val();
            return this.valueType === "number" ? parseInt(val || 0, 10) : val;
        },

        insertValue: function() {
            var val = this.insertControl.val();
            return this.valueType === "number" ? parseInt(val || 0, 10) : val;
        },

        editValue: function() {
            var val = ""+this.editControl.val();//.split(",");
            val=val.split(',');
            if(jQuery.inArray(val))
            {
                alert(val);
            }
            //alert(val);
            //alert(z);
            //arrval=val.split(',');
            /*$.each(val,function( index ) {
                  alert()
                });*/
            //alert(this.valueType === "number" ? parseInt(val || 0, 10) : val);
            return this.valueType === "number" ? parseInt(val || 0, 10) : val;
        },

        _createSelect: function(vl=-1) {
            var $result = $("<select multiple>"),
                valueField = this.valueField,
                textField = this.textField,
                selectedIndex = this.selectedIndex;
                $result.attr("class", "js-example-basic-multiple");

            $.each(this.items, function(index, item) {
                var value = valueField ? item[valueField] : index,
                    text = textField ? item[textField] : item;

                var $option = $("<option>")
                    .attr("value", value)
                    .text(text)
                    .appendTo($result);
            if(jQuery.inArray(value, vl)>=0){
                $option.prop("selected", true);
                }
            });
            return $result;
        }
    });

    jsGrid.fields.select = jsGrid.SelectField = SelectField;

}(jsGrid, jQuery));
