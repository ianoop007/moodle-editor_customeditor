@editor @editor_customeditor
Feature: Anoop Kakkur Rich Text Editor loads on Moodle pages
  In order to use the rich text editor
  As a teacher
  I need the editor to load when editing content

  Background:
    Given the following "users" exist:
      | username | firstname | lastname | email                |
      | teacher1 | Teacher   | One      | teacher1@example.com |
    And the following "courses" exist:
      | fullname | shortname |
      | Course 1 | C1        |
    And the following "course enrolments" exist:
      | user     | course | role           |
      | teacher1 | C1     | editingteacher |

  @javascript
  Scenario: The custom editor is available as a text editor option
    Given I log in as "admin"
    And I navigate to "Plugins > Text editors > Manage editors" in site administration
    Then I should see "Anoop Kakkur Rich Text Editor"

  @javascript
  Scenario: Teacher can access a page with a text editor
    Given I log in as "teacher1"
    And I am on "Course 1" course homepage with editing mode on
    When I add a "label" activity to course "Course 1" section "1"
    Then I should see "Label text"
