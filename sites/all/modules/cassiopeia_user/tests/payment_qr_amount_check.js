// Run: node sites/all/modules/cassiopeia_user/tests/payment_qr_amount_check.js
'use strict';
const assert = require('assert');
const fs = require('fs');
const vm = require('vm');
const handlers = {};
const ownerHandlers = {};
// Load the real page script; capture its field events without a browser or requests.
function $(selector) {
  if (typeof selector === 'function') { selector(); return; }
  return {length: 1, val: () => '', prop() { return this; }, attr() { return this; }, removeAttr() { return this; }, text() { return this; },
    on(events, handler) {
      if (selector === '#qr-amount') {
        events.split(' ').forEach(event => { handlers[event] = handler; });
      }
      if (selector === '.qr-account-owner') {
        events.split(' ').forEach(event => { ownerHandlers[event] = handler; });
      }
      return this;
    }};
}
$.trim = value => String(value).trim();
$.ajax = () => ({done() { return this; }, fail() { return this; }});
vm.runInNewContext(fs.readFileSync(__dirname + '/../js/payment-qr.js', 'utf8'), {
  jQuery: $, Drupal: {settings: {paymentQr: {}}}, document: {getElementById: () => ({})}
});
const field = {value: '', selectionStart: 0, setSelectionRange(start) { this.selectionStart = start; }};
function focus(value) { field.value = value; field.selectionStart = value.length; handlers.focus.call(field); }
function edit(value, caret, inputType, data) {
  field.value = value; field.selectionStart = caret;
  handlers.input.call(field, {type: 'input', originalEvent: {inputType, data}});
}
focus('');
for (const digit of '1500000') {
  edit(field.value + digit, field.value.length + 1, 'insertText', digit);
}
assert.strictEqual(field.value, '1.500.000');
edit('1.500.00', 8, 'deleteContentBackward');
assert.strictEqual(field.value, '150.000');
focus('1.500.000');
edit('1.2500.000', 3, 'insertText', '2');
assert.strictEqual(field.value, '12.500.000');
assert.strictEqual(field.selectionStart, 3, 'caret remains before the next digit, after regrouping');
for (const value of ['1500000', '1.500.000', '9999999999999']) {
  focus(''); edit(value, value.length, 'insertFromPaste');
  assert.strictEqual(field.value, value.replace(/\./g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
}
for (const value of ['-1000', '1e6', '1.5', '1,5', 'abc1000', '10000000000000']) {
  focus(''); edit(value, value.length, 'insertFromPaste');
  assert.strictEqual(field.value, value, 'invalid paste is not silently converted');
}
focus('1'); edit('1.', 2, 'insertText', '.'); edit('1.5', 3, 'insertText', '5');
assert.strictEqual(field.value, '1.5', 'typed decimal is not converted to 15');
focus('1.500.000'); edit('', 0, 'deleteContentBackward');
assert.strictEqual(field.value, '');
focus('nguyễn văn a');
ownerHandlers.input.call(field);
assert.strictEqual(field.value, 'NGUYỄN VĂN A', 'owner uppercase on profile and QR');

// Test formatContent and syncInvoiceToContent logic
const agencyName = 'NGUYEN HOANG GIANG';
function testFormatContent(code, invoice, mode, customer) {
  code = String(code || '').trim().toUpperCase().replace(/[^A-Z0-9 ]/g, '');
  const parts = [];
  if (code) { parts.push(code); }
  if (mode === 'company') {
    if (invoice) { parts.push(invoice); }
    parts.push('DL');
    if (agencyName) { parts.push(agencyName); }
  } else {
    parts.push('VMB');
    if (invoice) { parts.push(invoice); }
    if (customer) { parts.push(String(customer).trim().toUpperCase().replace(/[^A-Z0-9 ]/g, '')); }
  }
  return parts.join(' ').replace(/\s+/g, ' ').slice(0, 50);
}
assert.strictEqual(testFormatContent('X54BYD', 'CHD', 'company'), 'X54BYD CHD DL NGUYEN HOANG GIANG');
assert.strictEqual(testFormatContent('X54BYD', 'KHD', 'company'), 'X54BYD KHD DL NGUYEN HOANG GIANG');
assert.strictEqual(testFormatContent('CODE', 'CHD', 'saved', 'NGUYEN VAN A'), 'CODE VMB CHD NGUYEN VAN A');
assert.strictEqual(testFormatContent('CODE', 'KHD', 'saved', 'NGUYEN VAN A'), 'CODE VMB KHD NGUYEN VAN A');
assert.strictEqual(testFormatContent('E7RANW', 'CHD', 'personal', 'NGUYEN THANH NAN'), 'E7RANW VMB CHD NGUYEN THANH NAN');
assert.strictEqual(testFormatContent('E7RANW', 'KHD', 'personal', 'NGUYEN THANH NAN'), 'E7RANW VMB KHD NGUYEN THANH NAN');
assert.strictEqual(testFormatContent('', 'CHD', 'company'), 'CHD DL NGUYEN HOANG GIANG');

console.log('PASS: QR amount input grouping, caret, paste, invalid input and transfer content format (both company & customer modes)');

