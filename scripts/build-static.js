import { copyFile, cp, mkdir, readFile, writeFile } from 'node:fs/promises';
import { join, resolve } from 'node:path';
import { fileURLToPath } from 'node:url';

const projectRoot = resolve(fileURLToPath(new URL('..', import.meta.url)));
const templatePath = join(projectRoot, 'resources', 'views', 'portfolio.blade.php');
const outputDirectory = join(projectRoot, 'dist');

let html = await readFile(templatePath, 'utf8');

const substitutions = [
    ["{{ asset('images/profile.jpg') }}", '/images/profile.jpg'],
    ["{{ date('Y') }}", String(new Date().getFullYear())],
];

for (const [bladeExpression, replacement] of substitutions) {
    if (!html.includes(bladeExpression)) {
        throw new Error(`Expected Blade expression was not found: ${bladeExpression}`);
    }

    html = html.replaceAll(bladeExpression, replacement);
}

if (html.includes('{{')) {
    throw new Error('Unconverted Blade expression found in portfolio template.');
}

await mkdir(join(outputDirectory, 'images'), { recursive: true });
await writeFile(join(outputDirectory, 'index.html'), html, 'utf8');
await cp(join(projectRoot, 'public', 'images'), join(outputDirectory, 'images'), { recursive: true });
await copyFile(join(projectRoot, 'public', 'favicon.ico'), join(outputDirectory, 'favicon.ico'));
await copyFile(join(projectRoot, 'public', 'robots.txt'), join(outputDirectory, 'robots.txt'));

console.log('Static portfolio generated in dist/.');
