// Composition Example

// https://codepen.io/ericelliott/pen/XXzadQ?editors=001
// https://gist.github.com/ericelliott/fed0fd7a0d3388b06402

const test = require('tape');

const item = {
    id: 1,
    vendor_id: 1,
    sku_number: 9876,
};
const item_descriptions = [
    {
        id: 2,
        body: 'Example body',
    },
    {
        id: 4,
        body: 'Another example body',
    },
];

const myJsonExample = { item, item_descriptions };

const ItemAndDescriptions = (options) => {
    return Object.assign({}, item, item_descriptions, options);
};





test('ItemAndDescriptions', assert => {
    const msg = 'should have item and item_descriptions';
    const level = 2;

    const actual = ChannelStrip({
        inputLevel: level,
        lowCut: level,
        item: level
    });
    const expected = {
        inputLevel: level,
        lowCut: level,
        item: level
    };

    assert.deepEqual(actual, expected, msg);
    assert.end();
});