# retrojector
Project for reshaping data from flat CSV to more hierarchical structures (such as JSON / XLST / etc.)

User Story
----------

I have lots of interesting data in flat CSV format, but I want the ability to make this more dynamic and sexy with tools such as d3js. I want to be able to reformat the data and relationships within the data to create a more detailed hierarchical structure to the data.

Initial Objectives
--------------------

Import CSV data
Read all columns
Make columns available to be selectable in a hierarchical structure
Group all data that meets the hierarchical structure
Output in JSON / XLST format

Example
-------

CSV input:

Name, Location, Application, CPU, Memory, Disk
App01, London, Apache, 2, 2048, 50
App02, London, Apache, 2, 2048, 50
App03, New York, Apache, 4, 4096, 100
App03, New York, Apache, 4, 4096, 100
DB01, London, MongoDB, 4, 16000, 2000
DB02, London, MongoDB, 4, 16000, 2000

JSON output (I'm terrible and manually writing JSON, so will update later with a full conversion of the above):
{
 "name": "London",
 "children": [
  {
   "name": "Apache",
   "children": [
    {
     {"name": "App01", "CPU": 2, "Memory": 2048, "disk": 50},
     {"name": "App02", "CPU": 2, "Memory": 2048, "disk": 50}
    }
   ]
  }
}
