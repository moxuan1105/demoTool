jQuery.setInputSel = function(obj) {
    var optionGroup = '<option value="">请选择</option>';
    /*input和select控件的id及类名，若没有创建则默认给予*/
    var inputId = obj.inputId || 'inputId';
    var selectId = obj.selectId || 'selectId';
    var fatherBox = obj.fatherBox || 'sel-inp-box';
    var selectClass = obj.selectClass || 'selectClass';
    var inputClass = obj.inputClass || 'inputClass';
    var selectName = obj.selectName || 'selectName';
    var inputName = obj.inputName || 'inputName';
    /*根据数据渲染下拉框*/
    if (obj.optionGroup && obj.optionGroup.length > 0) {
        for (var i = 0; i < obj.optionGroup.length; i++) {
            var optionVal = obj.optionGroup[i].val || '';
            var optionName = obj.optionGroup[i].name || '';
            optionGroup += '<option value="' + optionVal + '" name="' + obj.optionGroup[i].name + '">' + obj.optionGroup[i].name + '</option>';
        }
    }
    /*渲染select控件，判断是否有传类名(用于渲染样式)*/
    var selectOp = '';
    if (obj.selectClass) {
        selectOp = '<select class="' + obj.selectClass + '" id="' + selectId + '" name="' + selectName + '" > ' + optionGroup + ' < /select>';
    } else {
        /*若selectClass在css有编写样式，此处style可为空*/
        selectOp = '<select style="width: 160px;position: absolute;top: 0;left: 0;height: 26px;" class="' + selectClass + '" id="' + selectId + '"  name="' + selectName + '">' + optionGroup + '</select>';
    }
    /*渲染input控件，判断是否有传类名(用于渲染样式)*/
    var inputOp = '';
    if (obj.inputClass) {
        inputOp = '<input type="text" class="' + obj.inputClass + '" id="' + inputId + '" data-name=""  name="' + inputName + '"/>';
    } else {
        /*若inputClass在css有编写样式，此处style可为空*/
        inputOp = '<input type="text" style="width: 135px;position: absolute;top: 0;left: 0;height: 20px;" class="' + inputClass + '" id="' + inputId + '" name="' + inputName + '"/>';
    }
    var op = '<div class="sel-inp-box">' + selectOp + inputOp + '</div>';
    $('#' + obj.parentId).append(op);
    /*下拉框值选择修改*/
    $('#' + selectId).change(function() {
        $('#' + inputId).val($('#' + selectId + ' option:selected').attr('name'));
        $('#' + inputId).attr('data-name', $(this).val());
    });
    /*输入框输入修改*/
    $('#' + inputId).change(function() {
        $('#' + selectId).val($('#' + selectId).val(''));
        $('#' + inputId).attr('data-name', '');
    });
}