const readline = require("readline");
const process = require("process");

// implement the function to merge configs
// customConf takes priority
function longestCommonPath(conf1, conf2) {
  let longestPath = "";

  function findCommonPath(obj1, obj2, currentPath) {
    for (let key in obj1) {
      if (obj2.hasOwnProperty(key)) {
        const newPath = currentPath ? `${currentPath}.${key}` : key;

        if (typeof obj1[key] === "object" && typeof obj2[key] === "object") {
          findCommonPath(obj1[key], obj2[key], newPath);
        } else if (newPath.length > longestPath.length) {
          longestPath = newPath;
        } else if (
          newPath.length === longestPath.length &&
          newPath < longestPath
        ) {
          longestPath = newPath;
        }
      }
    }
  }

  findCommonPath(obj1, obj2, "");

  return longestPath || "...";
}

// this is provided function to read test cases
// from stdin and write output to stdout
// you don't have to modify it
async function processCases() {
  const reader = readline.createInterface(process.stdin, process.stdout);
  let confs = [];
  for await (const line of reader) {
    const conf = JSON.parse(line);
    if (typeof conf === "object") {
      confs.push(conf);
      if (confs.length === 2) {
        const common = longestCommonPath(confs[0], confs[1]);
        console.log(common);
        confs = [];
      }
    }
  }
}

processCases();
