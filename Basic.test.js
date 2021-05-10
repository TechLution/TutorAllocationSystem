const Basic = require('./Basic');
test('When checkbox is not checked',()=>
{expect(Basic()).toBe(" ");});

const BasicT = require('./Basic');
test('When checkbox is checked',()=>
{expect(BasicT()).toBe('<input name="bcoMark" type="number" id="bcomark" class="form-control"  min="0" max="100" required="required">');});
