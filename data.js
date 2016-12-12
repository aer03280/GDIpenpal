'use strict';

var User = function(data) {
  this.type = data.type;
  this.id = data.username;
  this.preference = data.preference;

  this.getPreference = function(){
    return this.preference;
  };
};

function getUserData(userId){
  alert('userId=' + userId);

  for (var i in userData) {
    var record = userData[i];
    alert(record);
    if (record.username == userId) {
      return new User(record);
    }
  }
  alert('record not found');
  return null;
}

var userData = [
  {type: 'Survivor', username:'user1id', preference: 'Ally', pairedWith: 'user3Id'},
  {type: 'Survivor', username:'user2id', preference: 'Survivor', pairedWith: ''},
  {type: 'Ally', username:'user3id', preference: 'Survivor', pairedWith: 'user1Id'},
  {type: 'Ally', username:'user4id', preference: 'Counselor', pairedWith: ''},
  {type: 'Survivor', username:'user5id', preference: 'Counselor', pairedWith: 'user6Id'},
  {type: 'Counselor', username:'user6id', preference: 'Survivor', pairedWith: 'user5Id'}
];

document.addEventListener('DOMContentLoaded', function(event){
  // Main code starts here
  var user2 = getUserData('user2id');
  alert('user 2 wants a ' + user2.getPreference());

});

var results = document.getElementById('submit');

results.addEventListener('click', matcher);
function matcher(event) {
  // event.preventDefault();
  sortUsers();
  var holder = possibleUsers();
  var matchedResults = [];
  for (var i = 0; i < holder.length; i++) {
    var user = matchedResults[holder[i]];
    if (user) {
      matchedResults.push();
    }
  }

  function localStorageInsert(key, value) {
    if (typeof value !== 'undefined') {
      localStorage.setItem(key, JSON.stringify(value));
    }
  }
  function localStoragePull (key) {
    JSON.parse(localStorage.getItem(key));
  };
}
