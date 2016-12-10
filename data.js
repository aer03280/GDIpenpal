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
  {type: 'Survivor', username:'user1id', preference: 'Ally'},
  {type: 'Survivor', username:'user2id', preference: 'Survivor'},
  {type: 'Ally', username:'user3id', preference: 'Survivor'},
  {type: 'Ally', username:'user4id', preference: 'Counselor'},
  {type: 'Survivor', username:'user5id', preference: 'Counselor'},
  {type: 'Counselor', username:'user6id', preference: 'Survivor'}
];

document.addEventListener('DOMContentLoaded', function(event){
  // Main code starts here
  var user2 = getUserData('user2id');
  alert('user 2 wants a ' + user2.getPreference());

});
