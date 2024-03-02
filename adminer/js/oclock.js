let appOclock = {
  privilegesTable : null,
  init: () => {
    console.info('appOclock.init');
    let userInputElement = document.getElementById('pass');
    if (userInputElement) {
      let tbodyElement = userInputElement.closest('tbody');
      // td
      let tdElement = document.createElement('td');
      tdElement.setAttribute('colspan', 2);
      // checkbox
      let checkbox = document.createElement('input');
      checkbox.setAttribute('type', 'checkbox');
      checkbox.setAttribute('id', 'user-create-database');
      checkbox.setAttribute('name', 'user-create-database');
      // label
      let label = document.createElement('label');
      label.setAttribute('for', 'user-create-database');
      label.textContent = 'Grant all privileges to a database with same name (but you\'ll have to create it manually)';

      tdElement.appendChild(checkbox);
      tdElement.appendChild(label);
      
      let trElement = document.createElement('tr');
      trElement.appendChild(tdElement);
      tbodyElement.appendChild(tdElement);

      checkbox.addEventListener('click', appOclock.handleClickOnCheckbox);

      appOclock.privilegesTable = tbodyElement.closest('table').nextElementSibling;
      // console.log(appOclock.privilegesTable);
    }
  },
  handleClickOnCheckbox: (evt) => {
    let checkboxElement = evt.currentTarget;
    let inputElement = appOclock.privilegesTable.querySelector('input');
    let allPrivilegesElement = appOclock.privilegesTable.querySelector('input[name="grants[0][ALL PRIVILEGES]"]');
    let grantOptionElement = appOclock.privilegesTable.querySelector('input[name="grants[0][GRANT OPTION]"]');
    let username = document.querySelector('input[name="user"]').value.trim();
    // console.log(allPrivilegesElement);
    // console.log(grantOptionElement);

    // If checked
    if (checkboxElement.checked === true && username.length > 0) {
      inputElement.value = '`' + username + '`.*';
      allPrivilegesElement.checked = true;
      grantOptionElement.checked = true;
    }
    else {
      inputElement.value = '.*';
      allPrivilegesElement.checked = false;
      grantOptionElement.checked = false;
      checkboxElement.checked = false;
    }
  }
};

document.addEventListener('DOMContentLoaded', appOclock.init);