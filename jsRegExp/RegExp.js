/*
 * @Author: moxuan 
 * @Date: 2019-01-04 08:18:29 
 * @Last Modified by: moxuan
 * @Last Modified time: 2019-01-04 15:03:42
 */

/**
 * 
 * @param {Array} datas 
 * @returns {Array} Message
 */

function RegExp(datas) {
    var Message = [];

    //匹配这些中文标点符号 。 ？ ！ ， 、 ； ： “ ” ‘ ' （ ） 《 》 〈 〉 【 】 『 』 「 」 ﹃ ﹄ 〔 〕 … — ～ ﹏ ￥
    var patt_1 = /[\u3002|\uff1f|\uff01|\uff0c|\u3001|\uff1b|\uff1a|\u201c|\u201d|\u2018|\u2019|\uff08|\uff09|\u300a|\u300b|\u3008|\u3009|\u3010|\u3011|\u300e|\u300f|\u300c|\u300d|\ufe43|\ufe44|\u3014|\u3015|\u2026|\u2014|\uff5e|\ufe4f|\uffe5]/;

    //匹配全角字符
    var patt_2 = /[^\x00-\xff]/;

    // 匹配','
    var patt_3 = /,/g;

    // 匹配,后面是否有空格
    var patt_3_1 = /,\s{1}/i;

    // 匹配句首是否是大写字母开头
    var patt_4 = /^[A-Z][a-zA-Z]/;

    // 匹配句首格式
    var patt_5 = /^\d+\. [A-Z]|^[A-Z]+\. [A-Z]|^ - [A-Z]/;

    // 将数组内的字符串进行遍历
    for (var i = 0; i < datas.length; i++) {
        // 匹配是否含有中文字符
        if (patt_1.test(datas[i])) {
            Message.push(datas[i] + " 含有中文字符，不符合标准");
            continue;
        }
        // 匹配是否含有全角字符
        if (patt_2.test(datas[i])) {
            Message.push(datas[i] + " 含有全角字符，不符合标准");
            continue;
        }
        // 匹配','之后是否有空格
        if (patt_3.test(datas[i])) {
            if (!patt_3_1.test(datas[i])) {
                Message.push(datas[i] + " 含有,但是,后面无空格，不符合标准");
                continue;
            }
        }
        // 匹配句首格式
        if (!patt_4.test(datas[i])) {
            // 略过空行
            if (datas[i] == '') {
                continue;
            }
            // 略过空白行
            if (/^\s*$/.test(datas[i])) {
                continue;
            }
            
            // 匹配句首格式
            if (!patt_5.test(datas[i])) {
                // 判断句首是否有括号
                if (!/^\(.*\)$/.test(datas[i])) {
                    Message.push(datas[i] + " 不符合句首格式");
                }
                continue;
            }
        }
        // 匹配是否是'.'结尾
        if (!/\.$/.test(datas[i])) {
            Message.push(datas[i] + " 不符合句末格式");
            continue;
        }
    }
    // 返回错误信息 若没有错误信息则是''
    return Message;
}
