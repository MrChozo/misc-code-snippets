// Example of using async/await instead of using callbacks and repetive
// assertions
// From:  https://old.reddit.com/r/node/comments/fmywgt/when_and_correct_approach_to_use_the_assert_module/

// This
client.connect(function (err) {
  assert.equal(null, err);

  const col = client.db(dbName).collection('find');

  col.insertMany([{ a: 1 }, { a: 1 }, { a: 1 }], function (err, r) {
    assert.equal(null, err);
    assert.equal(3, r.insertedCount);

    col.find({ a: 1 }).limit(2).toArray(function (err, docs) {
      assert.equal(null, err);
      // ....
    });
  });
});



// Versus this, which is the more modern, correct approach
await client.connect();
const col = client.db(dbName).collection('find');
const r = await col.insertMany([{ a: 1 }, { a: 1 }, { a: 1 }]);
assert.equal(3, r.insertedCount);
const docs = col.find({ a: 1 }).limit(2).toArray();
